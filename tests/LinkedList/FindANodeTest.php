<?php /** @noinspection PhpUnusedLocalVariableInspection */

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class FindANodeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function willReturnTheMatchingNode(): void
    {
        $doubleLinkedList = new DoubleLinkedList();
        $one = $doubleLinkedList->prepend(1);
        $four = $doubleLinkedList->append(4);
        $three = $doubleLinkedList->insertBefore(3, $four);
        $two = $doubleLinkedList->insertBefore(2, $three);
        $five = $doubleLinkedList->prepend(5); // head
        $zero = $doubleLinkedList->insertBefore(0, $one);
        $hello = $doubleLinkedList->insertBefore('hello', $two);
        $seven = $doubleLinkedList->insertAfter(7, $hello);
        $eight = $doubleLinkedList->insertAfter(8, $four);

        $this->assertSame(
            $seven,
            $doubleLinkedList->find(7)
        );
    }
}