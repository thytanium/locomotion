<?php

namespace Thytanium\Locomotion\Syntax;

abstract class AbstractNode implements NodeInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $children = [];

    /**
     * @var array
     */
    protected $context = [];

    /**
     * New Node instance.
     *
     * @param string  $type
     * @param Node[]  $context
     */
    public function __construct(string $type, array $context = [])
    {
        $this->type = $type;
        $this->context = $context;
    }

    /**
     * Get children.
     *
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * Set context.
     *
     * @param array $context
     * @return $this
     */
    public function setContext(array $context): self
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context.
     *
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * Get node type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Attach child node.
     *
     * @param  NodeInterface $node
     * @return $this
     */
    public function attach(NodeInterface $node): NodeInterface
    {
        $this->children[] = $node;

        return $this;
    }

    /**
     * Detach child node.
     *
     * @param  int    $index
     * @return $this
     */
    public function detach(int $index): NodeInterface
    {
        unset($this->children[$index]);
        $this->children = array_values($this->children);

        return $this;
    }

    /**
     * Get transpiled children nodes.
     *
     * @return array
     */
    public function getTranspiledChildren(): array
    {
        $children = [];

        foreach ($this->getChildren() as $node) {
            $children[] = $node->transpile();
        }

        return $children;
    }
}
