<?php

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class SettingCurrentTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function settingCurrentOnFirstAppend(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $first = $doubleLinkedList->append(1);

        $this->assertEquals($first, $doubleLinkedList->current());
    }
}