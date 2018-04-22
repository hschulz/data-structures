<?php

namespace hschulz\DataStructures\Queue;

use \Countable;
use \IteratorAggregate;
use \Serializable;
use \SplPriorityQueue;
use \serialize;
use \unserialize;

/**
 *
 */
class PriorityQueue implements Countable, IteratorAggregate, Serializable {

    /**
     *
     * @var int
     */
    const PIRORITY_DEFAULT = 1;

    /**
     *
     * @var SplPriorityQueue
     */
    protected $queue = null;

    /**
     *
     * @var array
     */
    protected $items = [];

    /**
     *
     */
    public function __construct() {
        $this->items = [];
        $this->queue = new SplPriorityQueue();
    }

    /**
     *
     * @return array
     */
    public function toArray(): array {
        return $this->items;
    }

    /**
     *
     * @param type $data
     * @param int $priority
     * @return void
     */
    public function insert($data, int $priority = self::PIRORITY_DEFAULT): void {

        $this->items[] = [
            'data' => $data,
            'priority' => $priority
        ];

        $this->queue->insert($data, $priority);
    }

    /**
     *
     * @return int
     */
    public function count(): int {
        return $this->queue->count();
    }

    /**
     *
     * @return SplPriorityQueue
     */
    public function getIterator(): SplPriorityQueue {
        return clone $this->queue;
    }

    /**
     *
     * @return string
     */
    public function serialize() {
        return serialize($this->items);
    }

    /**
     *
     * @param string $queueData
     * @return void
     */
    public function unserialize($queueData) {

        foreach (unserialize($queueData) as $element) {
            $this->insert($element['data'], $element['priority']);
        }
    }

    /**
     *
     * @param PriorityQueue $queue
     * @return void
     */
    public function merge(PriorityQueue $queue): void {

        $data = $queue->toArray();

        foreach ($data as $element) {
            $this->insert($element['data'], $element['priority']);
        }
    }
}
