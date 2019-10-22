<?php

namespace Thytanium\Locomotion\Syntax;

use InvalidArgumentException;

class Compare extends AbstractNode implements NodeInterface
{
    public const COMPARE_TYPE = 'COMPARE';
    protected const OPERATOR_NAMESPACE = 'Ruler\\Operator\\';

    /**
     * New Compare node instance.
     *
     * @param array $context
     */
    public function __construct(array $context = [])
    {
        parent::__construct(self::COMPARE_TYPE, $context);
    }

    /**
     * Transform this node into executable code.
     *
     * @return mixed
     */
    public function transpile()
    {
        $class = $this->getOperatorClassName();

        return new $class(...$this->getTranspiledChildren());
    }

    /**
     * Get operator class name to build object.
     *
     * @return string
     */
    protected function getOperatorClassName(): string
    {
        if (empty($this->context['operator'] ?? null)) {
            throw new InvalidArgumentException('Missing operator');
        }

        return static::OPERATOR_NAMESPACE . $this->context['operator'];
    }
}
