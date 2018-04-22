<?php

namespace hschulz\DataStructures\Tree;

/**
 *
 */
interface TreeNodeInterface {

    /**
     *
     * @param TreeNodeInterface $node
     * @return void
     */
    public function addChild(TreeNodeInterface $node);

    /**
     *
     * @return array
     */
    public function getChildren(): array;

    /**
     *
     * @param int $index
     * @return TreeNodeInterface
     */
    public function getChildAt(int $index): TreeNodeInterface;

    /**
     *
     * @return int
     */
    public function getChildCount(): int;

    /**
     *
     * @param TreeNodeInterface $node
     * @return int
     */
    public function getIndex(TreeNodeInterface $node): int;

    /**
     *
     * @return bool
     */
    public function isLeaf(): bool;
}
