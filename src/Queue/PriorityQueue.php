<?php

declare(strict_types=1);

namespace Hschulz\DataStructures\Queue;

use Serializable;
use function serialize;
use SplPriorityQueue;
use function unserialize;

/**
 *
 */
class PriorityQueue extends SplPriorityQueue implements Serializable
{
    /**
     * The default priority value used when no priority is given.
     * @var int
     */
    public const PIRORITY_DEFAULT = 1;

    /**
     * Iterates the queue and returns an array containing each item with
     * the data and priority set.
     *
     * @return array The array representation of the queue
     */
    public function toArray(): array
    {
        /* Enable extraction of data and priority */
        $this->setExtractFlags(self::EXTR_BOTH);

        /* Prepare output */
        $data = [];

        /* Iterate yourself */
        foreach ($this as $item) {
            $data[] = $item;
        }

        return $data;
    }

    /**
     * Allows inserting data into the queue without explicitly setting a
     * priority value. Inserts without a priority will use the PRIORITY_DEFAULT
     * value.
     *
     * @param mixed $data The data to insert
     * @param mixed $priority The priority
     * @return void
     */
    public function insert($data, $priority = self::PIRORITY_DEFAULT): void
    {
        parent::insert($data, $priority);
    }

    /**
     * Serializes the queue by converting the queue into an array.
     *
     * @return string The serialized queue
     */
    public function serialize(): string
    {
        return serialize($this->toArray());
    }

    /**
     * Unserializes the queue.
     *
     * @param string $queue The serialized queue data
     * @return void
     */
    public function unserialize($queue): void
    {
        foreach (unserialize($queue) as $item) {
            $this->insert($item['data'], $item['priority']);
        }
    }

    /**
     * Merges the given queue data into this queue.
     *
     * @param PriorityQueue $queue The queue to merge
     * @return void
     */
    public function merge(self $queue): void
    {
        $data = $queue->toArray();

        foreach ($data as $item) {
            $this->insert($item['data'], $item['priority']);
        }
    }
}
