<?php

namespace hschulz\DataStructures\Tree;

use \array_search;
use \count;

/**
 *
 */
abstract class AbstractTreeNode implements TreeNodeInterface
{

    /**
     *
     * @var array
     */
    protected $children = [];

    /**
     *
     * @var bool
     */
    protected $isLeaf = true;

    /**
     *
     */
    public function __construct()
    {
        $this->children = [];
    }

    /**
     *
     * @param TreeNodeInterface $node
     * @return void
     */
    public function addChild(TreeNodeInterface $node): void
    {
        $this->children[] = $node;
        $this->isLeaf = false;
    }

    /**
     *
     * @param int $index
     * @return TreeNodeInterface
     */
    public function getChildAt(int $index): TreeNodeInterface
    {
        return empty($this->children[$index]) ? null : $this->children[$index];
    }

    /**
     *
     * @return int
     */
    public function getSumChildCount(): int
    {
        $count = count($this->children);

        if ($count > 0) {
            foreach ($this->children as $node) {
                $count += $node->getChildCount();
            }
        }

        return $count;
    }

    /**
     *
     * @return int
     */
    public function getChildCount(): int
    {
        return count($this->children);
    }

    /**
     *
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     *
     * @param TreeInterface $node
     * @return int
     */
    public function getIndex(TreeNodeInterface $node): int
    {
        $index = array_search($node, $this->children, true);
        return ($index === false) ? -1 : $index;
    }

    /**
     *
     * @return bool
     */
    public function isLeaf(): bool
    {
        return $this->isLeaf;
    }
}
