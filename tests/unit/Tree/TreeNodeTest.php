<?php

namespace hschulz\DataStructures\Tests\Tree;

use \hschulz\DataStructures\Tree\TreeNode;
use \PHPUnit\Framework\TestCase;

/**
 *
 */
final class TreeNodeTest extends TestCase
{
    public function testEmptyTreeIsLeaf()
    {
        $tree = new TreeNode();

        $this->assertTrue($tree->isLeaf());
    }
}
