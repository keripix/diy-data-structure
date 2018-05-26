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
    /**
     * @var int
     */
    private $iterationPosition;

    public function __construct()
    {
        $this->size = 0;
        $this->iterationPosition = 0;
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

    /**
     * Add a new node from the front of the Linked List.
     * The new node will become the head.
     *
     * The old head will be after the new head,
     * thus it will be "next" to the head, not PREVIOUS,
     * as nothing comes before the head.
     *
     * @param $value
     * @return Node
     */
    public function prepend($value): Node
    {
        $newHead = new Node($value, $this->head, null);
        // if not empty, the current head should point next to the newHead
        if ($this->head !== null) {
            $this->head->pointsPreviousAt($newHead);
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
        $newTail = new Node($value, null, $this->tail);
        // if not empty, then the current tail should point previosly at the new tail
        if ($this->tail !== null) {
            $this->tail->pointsNextAt($newTail);
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
     * The $node will be before the newly created node.
     * Thus:
     * - the newNode next points to $node,
     * - the newNode previous points to $node->previous
     * - the $node->previous will point to new node
     *
     * If the $node is the current head, then the new node
     * will be the new head
     *
     * @param $value
     * @param Node $node
     * @return Node
     */
    public function insertBefore($value, Node $node): Node
    {
        $newNode = new Node($value, $node, $node->previous());
        if ($node->previous() !== null) {
            $node->previous()->pointsNextAt($newNode);
        }
        // update the chain
        $node->pointsPreviousAt($newNode);
        // if node is the old head, then this new node should be the new head
        if ($this->head === $node) {
            $this->head = $newNode;
        }

        $this->size++;

        return $newNode;
    }

    /**
     * The $node will be after the newly created node.
     * Thus:
     * - the newNode previous points toward $node,
     * - the newNode next points to $node->next
     * - the $node->nexr will point to new node
     *
     * If the $node is the current tail the new node
     * will be the new tail
     *
     * @param $value
     * @param Node $node
     * @return Node
     */
    public function insertAfter($value, Node $node): Node
    {
        $newNode = new Node($value, $node->next(), $node);

        if ($node->next() !== null) {
            $node->next()->pointsPreviousAt($newNode);
        }

        if ($this->tail === $node) {
            $this->tail = $newNode;
        }

        $node->pointsNextAt($newNode);

        $this->size++;

        return $newNode;
    }

    public function find($value): ?Node
    {
        $node = null;
        $this->rewind();
        while (!($node instanceof Node) && $this->valid()) {
            $node = $this->current->value() == $value ? $this->current : null;
            $this->next();
        }

        return $node;
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
        $this->iterationPosition++;
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
        return $this->iterationPosition;
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
        $this->current = $this->head;
        $this->iterationPosition = 0;
    }
}