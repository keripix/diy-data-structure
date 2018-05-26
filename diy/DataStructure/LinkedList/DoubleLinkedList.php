<?php

namespace Diy\DataStructure\LinkedList;

class DoubleLinkedList implements \Iterator
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
     * @var Node|null
     */
    private $current;
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
            $this->current = $this->tail;
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
        $this->current = $this->tail;
        // if the head is empty, then it points at the new tail
        if ($this->head === null) {
            $this->head = $newTail;
        }

        $this->size++;

        return $newTail;
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->current = $this->current->next();
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->current === null ? null : $this->current->value();
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return $this->current !== null;
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        if ($this->current->previous() !== null) {
            $this->current = $this->current->previous();
        }
    }
}