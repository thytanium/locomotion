<?php

namespace Tests\Syntax;

use PHPUnit\Framework\TestCase;
use Thytanium\Locomotive\Syntax\Node;

class NodeTest extends TestCase
{
    public function testItReturnsValidChildren(): void
    {
        $node = new Node('type', $children = ['child1', 'child2']);

        $this->assertEquals($children, $node->getChildren());
    }
}
