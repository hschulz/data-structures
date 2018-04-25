<?php

namespace hschulz\DataStructures\Tests\Tree;

use \PHPUnit\Framework\TestCase;
use \hschulz\DataStructures\Tree\AbstractTreeNode;

/**
 *
 */
final class AbstractTreeNodeTest extends TestCase {

    public function testConcreteImplementation() {

        $stub = $this->getMockForAbstractClass(AbstractTreeNode::class);

        $stub->expects($this->any())
             ->method('isLeaf')
             ->will($this->returnValue(true));

        $this->assertTrue($stub->isLeaf());
    }
}
