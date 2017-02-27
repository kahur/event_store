<?php

namespace AWM\EventStore;


use AWM\EventStore\Event;
use AWM\EventStore\StorageInterface;

class EventStore
{
    /**
     * @var StorageInterface
     */
    protected $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param Event $event
     * @return mixed
     */
    public function store(Event $event)
    {
        return $this->storage->store($event->toArray());
    }
}