<?php

declare(strict_types=1);

namespace Hschulz\DataStructures\Tests\Unit\Tree;

use Hschulz\DataStructures\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

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
