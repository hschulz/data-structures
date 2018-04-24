<?php

namespace hschulz\DataStructures\Tests;

use \PHPUnit\Framework\TestCase;

/**
 *
 */
final class PriorityQueueTest extends TestCase {

    public function testCanAddIntegers() {
        $queue = new \hschulz\DataStructures\Queue\PriorityQueue();

        $queue->insert(666, 2);
        $queue->insert(777, 4);

        $count = $queue->count();

        $this->assertEquals(2, $count, 'Expecting 2 items');

        $data = [];

        foreach ($queue as $item) {
            $data[] = $item;
        }

        $this->assertEquals(2, count($data), 'Expected 2 items');

        $this->assertEquals(777, $data[0], 'Expecting 777 because of priority');
        $this->assertEquals(666, $data[1], 'Expecting 666 because of priority');
    }
}
