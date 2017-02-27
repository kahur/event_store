<?php

namespace AWM\EventStore\Storage;

use Phalcon\Mvc\Model;
use AWM\Constants\ApiErrors;
use AWM\EventStore\Event;
use AWM\EventStore\StorageInterface;

class MySQL implements StorageInterface
{
    /**
     * @var \Phalcon\Db\Adapter\Pdo\Mysql
     */
    protected $storage;

    /**
     * MySQL constructor.
     * @param Model $storage
     */
    public function __construct(\PDO $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param $data
     * @throws \RuntimeException
     * @return bool
     */
    public function store($data)
    {
        if(!is_array($data)) {
            throw new \RuntimeException('Wrong format of data given');
        }


        if(!$this->storage->insert('events', $data, ['aggregate_id', 'name' ,'content', 'sequence_id'])) {
            throw new \RuntimeException(
                'Cannot save event, message: '.$this->storage->getMessages()[0]->getMessage(),
                ApiErrors::ERR_HANDLER_ERROR
            );
        }

        return true;
    }
}