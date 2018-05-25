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
        $newHead = new Node($value, null, $this->head);
        // if not empty, the current head should point next to the newHead
        if ($this->head !== null) {
            $this->head->pointsNextAt($newHead);
        }
        // replace the current head with the new one
        $this->head = $newHead;
        // if the tail is empty, then the new head is the tail
        if ($this->tail === null) {
            $this->tail = $newHead;
        }

        $this->size++;

        return $newHead;
    }

    public function append($value): Node
    {
        $newTail = new Node($value, $this->tail, null);
        // if not empty, then the current tail should point previosly at the new tail
        if ($this->tail !== null) {
            $this->tail->pointsPreviousAt($newTail);
        }
        // the new tail
        $this->tail = $newTail;
        // if the head is empty, then it points at the new tail
        if ($this->head === null) {
            $this->head = $newTail;
        }

        $this->size++;

        return $newTail;
    }
}