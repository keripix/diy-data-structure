<?php

namespace Diy\DataStructure\LinkedList;

class DoubleLinkedList
{

    private $head;
    private $tail;

    public function getSize()
    {
        return 0;
    }

    public function current()
    {
        return null;
    }

    public function head()
    {
        return $this->head;
    }

    public function tail()
    {
        return $this->tail;
    }

    public function next()
    {
        return null;
    }

    public function previous()
    {
        return null;
    }

    public function prepend($value)
    {
        $this->head = $value;
        $this->tail = $value;
        return $value;
    }
}