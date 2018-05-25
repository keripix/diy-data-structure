<?php

namespace Diy\DataStructure\LinkedList;

class Node
{
    /**
     * @var mixed
     */
    private $value;
    /**
     * @var Node
     */
    private $next;
    /**
     * @var Node
     */
    private $previous;

    public function __construct($value, Node $next = null, Node $previous = null)
    {
        $this->value = $value;
        $this->next = $next;
        $this->previous = $previous;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return Node
     */
    public function getNext(): Node
    {
        return $this->next;
    }

    /**
     * @return Node
     */
    public function previous(): Node
    {
        return $this->previous;
    }

}