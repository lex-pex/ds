<?php

namespace DataStructures\Tests;

use PHPUnit\Framework\TestCase;
use DataStructures\Stack;

class StackTest extends TestCase
{
    public function testPushAndPop()
    {
        $stack = new Stack();
        $stack->push(10);
        $stack->push(20);
        $this->assertEquals(20, $stack->pop());
        $this->assertEquals(10, $stack->pop());
    }

    public function testPeek()
    {
        $stack = new Stack();
        $stack->push(10);
        $this->assertEquals(10, $stack->peek());
        $this->assertEquals(10, $stack->pop());
    }

    public function testPopOnEmptyStack()
    {
        $this->expectException(\UnderflowException::class);
        $stack = new Stack();
        $stack->pop();
    }
}
