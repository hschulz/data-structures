<?php

namespace hschulz\DataStructures\Tree;

/**
 *
 */
interface TreeNodeInterface
{
    /**
     * Adds a TreeNode to the tree.
     *
     * @param TreeNodeInterface $node The new node
     * @return void
     */
    public function addChild(self $node): void;

    /**
     * Returns the array representation of the tree.
     *
     * @return array
     */
    public function getChildren(): array;

    /**
     * Returns the tree node at the given position.
     *
     * @param int $index The index position
     * @return TreeNodeInterface|null The node at the given position
     */
    public function getChildAt(int $index): ?self;

    /**
     * Returns the number of all nodes in this tree.
     *
     * @return int The number of all nodes.
     */
    public function getChildCount(): int;

    /**
     * Returns the index position of the given node in this tree.
     * Will return -1 if the node was not found in this tree.
     *
     * @param TreeNodeInterface $node
     * @return int The index position or -1 if the node was not found.
     */
    public function getIndex(self $node): int;

    /**
     * Returns true if the tree has no child elements.
     *
     * @return bool True if there are no child elements in this tree.
     */
    public function isLeaf(): bool;
}
