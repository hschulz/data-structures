<?php

namespace hschulz\DataStructures\Tests;

use \hschulz\DataStructures\Queue\PriorityQueue;
use \PHPUnit\Framework\TestCase;
use function \count;
use function \serialize;
use function \unserialize;

/**
 *
 */
final class PriorityQueueTest extends TestCase
{
    /**
     * @var string
     */
    const SERIALIZED_QUEUE = 'C:42:"hschulz\DataStructures\Queue\PriorityQueue":59:{a:1:{i:0;a:2:{s:4:"data";s:4:"test";s:8:"priority";i:100;}}}';

    /**
     *
     */
    public function testCanAddIntegers()
    {
        $queue = new PriorityQueue();

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

    /**
     *
     */
    public function testCanAddFloats()
    {
        $queue = new PriorityQueue();

        $queue->insert(777.7, 8);
        $queue->insert(888.8, 16);

        $count = $queue->count();

        $this->assertEquals(2, $count);

        $data = [];

        foreach ($queue as $item) {
            $data[] = $item;
        }

        $this->assertEquals(2, count($data));

        $this->assertEquals(888.8, $data[0]);
        $this->assertEquals(777.7, $data[1]);
    }

    /**
     *
     */
    public function testCanBeSerialized()
    {
        $queue = new PriorityQueue();

        $queue->insert('test', 100);

        $serialized = serialize($queue);

        $this->assertEquals(self::SERIALIZED_QUEUE, $serialized);
    }

    /**
     *
     */
    public function testCanBeUnserialized()
    {
        $queue = unserialize(self::SERIALIZED_QUEUE);

        $this->assertInstanceOf(PriorityQueue::class, $queue);

        $data = $queue->toArray();

        $this->assertEquals('test', $data[0]['data']);

        $this->assertEquals(100, $data[0]['priority']);
    }
}
