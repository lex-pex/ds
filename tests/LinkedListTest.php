<?php

namespace DataStructures\Tests;

use PHPUnit\Framework\TestCase;
use DataStructures\LinkedList;

class LinkedListTest extends TestCase
{
    public function testAdd()
    {
        $list = new LinkedList();
        $list->add(10);
        $list->add(20);

        $this->assertEquals(2, $list->size());
    }

    public function testRemove()
    {
        $list = new LinkedList();
        $list->add(10);
        $list->add(20);
        $list->remove(10);

        $this->assertEquals(1, $list->size());
    }

    public function testRemoveNonExistent()
    {
        $list = new LinkedList();
        $list->add(10);
        $list->remove(20); // Non-existent element

        $this->assertEquals(1, $list->size());
    }
}
