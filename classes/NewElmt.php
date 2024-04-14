<?php

abstract class NewElmt
{

    public function __construct(
        protected PDO $pdo,
        protected string $tableName
    )
        {
    }

    abstract public function insert(array $sourceData);

}