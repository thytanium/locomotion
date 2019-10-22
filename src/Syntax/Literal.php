<?php

namespace Thytanium\Locomotion\Syntax;

use Ruler\Variable;

class Literal extends AbstractNode implements NodeInterface
{
    public const LITERAL_TYPE = 'LITERAL';

    /**
     * New Literal node instance.
     *
     * @param array $context
     */
    public function __construct(array $context = [])
    {
        parent::__construct(self::LITERAL_TYPE, $context);
    }

    /**
     * Transform this node into executable code.
     *
     * @return mixed
     */
    public function transpile()
    {
        return new Variable(null, $this->context['value'] ?? null);
    }

    /**
     * Get literal value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->context['value'];
    }
}
