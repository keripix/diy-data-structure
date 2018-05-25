<?php

namespace Diy\DataStructure\LinkedList;

class DoubleLinkedList
{

    private $head;

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
        return null;
    }

    public function next()
    {
        return null;
    }

    public function previous()
    {
        return null;
    }

    public function prepend($string)
    {
        $this->head = $string;
        return $string;
    }
}