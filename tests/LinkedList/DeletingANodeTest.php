<?php /** @noinspection PhpUnusedLocalVariableInspection */

namespace Diy\DataStructure\Tests\LinkedList;

use Diy\DataStructure\LinkedList\DoubleLinkedList;

class DeletingANodeTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @test
     */
    public function shouldDeleteTheCorrectNode(): void
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
        // nodes: 5, 0, 1, 'hello', 7, 2, 3, 4, 8

        $deleted = $doubleLinkedList->deleteHavingValue('hello');

        $this->assertSame($hello, $deleted);
    }

    /**
     * @test
     */
    public function whenDeletingANodeThenThePreviousNodeNextPointerShouldPointTowardTheNextValidNode(): void
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
        // nodes: 5, 0, 1, 'hello', 7, 2, 3, 4, 8

        $deleted = $doubleLinkedList->deleteHavingValue('hello');

        $this->assertSame($seven, $one->next());
    }

    /**
     * @test
     */
    public function whenDeletingANodeThenTheNextNodePreviousPointerShouldPointTowardThePreviousValidNode(): void
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
        // nodes: 5, 0, 1, 'hello', 7, 2, 3, 4, 8

        $deleted = $doubleLinkedList->deleteHavingValue('hello');

        $this->assertSame($one, $seven->previous());
    }

    /**
     * @test
     */
    public function whenDeletingANodeThenTheSizeIsDecreased(): void
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
        // nodes: 5, 0, 1, 'hello', 7, 2, 3, 4, 8

        $deleted = $doubleLinkedList->deleteHavingValue('hello');

        $this->assertEquals(8, $doubleLinkedList->size());
    }
}