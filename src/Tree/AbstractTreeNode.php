<?php

namespace hschulz\DataStructures\Tree;

use function \array_search;
use function \count;

/**
 *
 */
abstract class AbstractTreeNode implements TreeNodeInterface
{
    /**
     * The actual node data.
     * @var array
     */
    protected $children = [];

    /**
     * Will be false when any child nodes are added.
     * @var bool
     */
    protected $isLeaf = true;

    /**
     * Creates a new leaf node.
     */
    public function __construct()
    {
        $this->children = [];
        $this->isLeaf = true;
    }

    /**
     * Adds the given tree node to this nodes child list.
     *
     * @param TreeNodeInterface $node The node to be inserted
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
     * @return TreeNodeInterface|null
     */
    public function getChildAt(int $index): ?TreeNodeInterface
    {
        return empty($this->children[$index]) ? null : $this->children[$index];
    }

    /**
     * Returns the total sum of all children and their children.
     *
     * @return int The total sum of all children
     */
    public function getSumChildCount(): int
    {
        $count = count($this->children);

        foreach ($this->children as $node) {
            $count += $node->getChildCount();
        }

        return $count;
    }

    /**
     * Returns the number of child nodes for this node.
     *
     * @return int The number of child nodes.
     */
    public function getChildCount(): int
    {
        return count($this->children);
    }

    /**
     * Returns an array containing the child nodes of this node.
     *
     * @return array The child nodes or an empty array
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
        return $index === false ? -1 : $index;
    }

    /**
     * Returns true if this node doesn't have child nodes.
     *
     * @return bool True if this node doesn't have no child nodes.
     */
    public function isLeaf(): bool
    {
        return $this->isLeaf;
    }
}
