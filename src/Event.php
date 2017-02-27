<?php

namespace AWM\EventStore;


class Event
{
    protected $aggregate_id;
    protected $name;
    protected $content;
    protected $sequence_id;

    /**
     * Event constructor.
     * @param string $aggregate_id
     * @param string $name
     * @param string $content
     * @param int $created_at timestamp
     */
    final public function __construct(
        $aggregate_id,
        $name,
        $content,
        $sequence_id = null
    )
    {
        $this->aggregate_id = $aggregate_id;
        $this->name = $name;
        $this->content = $content;
        $this->sequence_id = $sequence_id;
    }

    public function getAggregateId()
    {
        return $this->aggregate_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getSequenceId()
    {
        return $this->sequence_id;
    }

    public function toArray()
    {
        return [
            'aggregate_id' => $this->aggregate_id,
            'name'         => $this->name,
            'content'      => $this->content,
            'sequence_id'  => ($this->sequence_id) ? $this->sequence_id : (new \DateTime())->getTimestamp()
        ];
    }
}