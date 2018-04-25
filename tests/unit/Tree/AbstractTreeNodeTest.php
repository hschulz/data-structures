<?php

namespace hschulz\DataStructures\Tests\Tree;

use \hschulz\DataStructures\Tree\AbstractTreeNode;
use \PHPUnit\Framework\TestCase;

/**
 *
 */
final class AbstractTreeNodeTest extends TestCase
{
    public function testConcreteImplementation()
    {
        $stub = $this->getMockForAbstractClass(
            AbstractTreeNode::class, [], '', true, true, true, ['isLeaf']
        );

        $stub->expects($this->any())
             ->method('isLeaf')
             ->will($this->returnValue(true));

        $this->assertTrue($stub->isLeaf());
    }
}
