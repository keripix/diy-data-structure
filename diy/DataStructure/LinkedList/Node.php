<?php

namespace Diy\DataStructure\LinkedList;

class Node
{
    /**
     * @var mixed
     */
    private $value;
    /**
     * @var Node|null
     */
    private $next;
    /**
     * @var Node|null
     */
    private $previous;

    public function __construct($value, Node $next = null, Node $previous = null)
    {
        $this->value = $value;
        $this->next = $next;
        $this->previous = $previous;
    }

    public function pointsNextAt(Node $node): void
    {
        $this->next = $node;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return Node
     */
    public function next(): ?Node
    {
        return $this->next;
    }

    /**
     * @return Node
     */
    public function previous(): ?Node
    {
        return $this->previous;
    }

}