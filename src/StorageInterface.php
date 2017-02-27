<?php

namespace AWM\EventStore;

interface StorageInterface
{
    public function store($data);
}