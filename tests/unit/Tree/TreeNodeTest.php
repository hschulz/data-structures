<?php

namespace hschulz\DataStructures\Tests\Tree;

use \PHPUnit\Framework\TestCase;
use \hschulz\DataStructures\Tree\TreeNode;

/**
 *
 */
final class TreeNodeTest extends TestCase {

    public function testEmptyTreeIsLeaf() {

        $tree = new TreeNode();

        $this->assertTrue($tree->isLeaf());
    }
}
