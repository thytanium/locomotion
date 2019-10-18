<?php

namespace Thytanium\Locomotive\Syntax;

class Node
{
    protected $type;
    protected $children;

    public function __construct(string $type, array $children = [])
    {
        $this->type = $type;
        $this->children = $children;
    }

    public function getChildren(): array
    {
        return $this->children;
    }
}
