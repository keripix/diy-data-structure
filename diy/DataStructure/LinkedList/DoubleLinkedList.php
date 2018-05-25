<?php

namespace Diy\DataStructure\LinkedList;

class DoubleLinkedList
{
    /**
     * @var Node
     */
    private $head;
    /**
     * @var Node
     */
    private $tail;
    /**
     * @var int
     */
    private $size;

    public function __construct()
    {
        $this->size = 0;
    }

    public function getSize(): int
    {
        return $this->size;
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

    public function prepend($value): Node
    {
        $newNode = new Node($value);
        $this->head = $newNode;
        $this->tail = $newNode;

        $this->size++;

        return $newNode;
    }
}