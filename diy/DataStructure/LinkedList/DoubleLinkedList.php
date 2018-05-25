<?php

namespace Diy\DataStructure\LinkedList;

class DoubleLinkedList
{
    /**
     * @var Node|null
     */
    private $head;
    /**
     * @var Node|null
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

    public function size(): int
    {
        return $this->size;
    }

    public function head(): ?Node
    {
        return $this->head;
    }

    public function tail(): ?Node
    {
        return $this->tail;
    }

    public function prepend($value): Node
    {
        $newNode = new Node($value, null, $this->head);
        $this->head = $newNode;

        if ($this->tail === null) {
            $this->tail = $newNode;
        }

        $this->size++;

        return $newNode;
    }

    public function append($value): Node
    {
        $newNode = new Node($value);
        $this->tail = $newNode;

        if ($this->head === null) {
            $this->head = $newNode;
        }

        $this->size++;

        return $newNode;
    }
}