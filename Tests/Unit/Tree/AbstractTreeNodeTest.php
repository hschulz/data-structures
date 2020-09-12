<?php

declare(strict_types=1);

namespace Hschulz\DataStructures\Tests\Unit\Tree;

use Hschulz\DataStructures\Tree\AbstractTreeNode;
use PHPUnit\Framework\TestCase;

/**
 *
 */
final class AbstractTreeNodeTest extends TestCase
{
    public function testConcreteImplementation()
    {
        $stub = $this->getMockForAbstractClass(
            AbstractTreeNode::class,
            [],
            '',
            true,
            true,
            true,
            ['isLeaf']
        );

        $stub->expects($this->any())
             ->method('isLeaf')
             ->will($this->returnValue(true));

        $this->assertTrue($stub->isLeaf());
    }
}
