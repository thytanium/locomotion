<?php

namespace Thytanium\Locomotion\Syntax;

interface NodeInterface
{
    /**
     * Get node type.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get children.
     *
     * @return array
     */
    public function getChildren(): array;

    /**
     * Get context.
     *
     * @return array
     */
    public function getContext(): array;

    /**
     * Attach child node.
     *
     * @param  NodeInterface $node
     * @return $this
     */
    public function attach(NodeInterface $node): NodeInterface;

    /**
     * Detach child node.
     *
     * @param  int    $index
     * @return $this
     */
    public function detach(int $index): NodeInterface;

    /**
     * Transform this node into executable code.
     *
     * @return mixed
     */
    public function transpile();
}
