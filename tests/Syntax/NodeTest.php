<?php

namespace Tests\Syntax;

use PHPUnit\Framework\TestCase;
use Thytanium\Locomotion\Syntax\AbstractNode;

class NodeTest extends TestCase
{
    public function testItReturnsProvidedContext(): void
    {
        $node = new Node('test_type', $context = ['test' => true]);

        $this->assertEquals($context, $node->getContext());

        $node = new Node('test_type');

        $this->assertEquals([], $node->getContext());

        $node->setContext($context = ['label' => 'new context']);

        $this->assertEquals($context, $node->getContext());
    }

    public function testItReturnsProvidedType(): void
    {
        $node = new Node($type = 'test_type');

        $this->assertEquals($type, $node->getType());
    }

    public function testItHandlesChildren(): void
    {
        $node = new Node('test_type');

        $this->assertEquals([], $node->getChildren());

        $node1 = new Node('test_type', ['label' => 'child1']);
        $node2 = new Node('test_type2', ['label' => 'child2']);
        $node3 = new Node('test_type2', ['label' => 'child3']);

        $node->attach($node1);

        $this->assertEquals([$node1], $node->getChildren());

        $node->attach($node2);

        $this->assertEquals([$node1, $node2], $node->getChildren());

        $node->attach($node3);

        $this->assertEquals([$node1, $node2, $node3], $node->getChildren());

        $node->detach(1); // Detach node2 in position 1

        $this->assertEquals([$node1, $node3], $node->getChildren());
    }
}

class Node extends AbstractNode
{
    public function transpile()
    {
        return true;
    }
}
