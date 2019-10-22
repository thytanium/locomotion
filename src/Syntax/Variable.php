<?php

namespace Thytanium\Locomotion\Syntax;

use InvalidArgumentException;
use Ruler\Variable as BaseVariable;

class Variable extends AbstractNode implements NodeInterface
{
    public const VARIABLE_TYPE = 'VARIABLE';

    /**
     * New Variable node instance.
     *
     * @param array $context
     */
    public function __construct(array $context = [])
    {
        parent::__construct(self::VARIABLE_TYPE, $context);
    }

    /**
     * Transform this node into executable code.
     *
     * @return mixed
     */
    public function transpile()
    {
        if (!isset($this->context['name'])) {
            throw new InvalidArgumentException("Variable name can't be empty");
        }

        return new BaseVariable($this->context['name']);
    }
}
