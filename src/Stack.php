<?php

namespace DataStructures;

class Stack extends Collection
{
    // Adds an element to the top of the stack
    public function push($value): void
    {
        $this->add($value);
    }

    // Removes and returns the top element from the stack
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Stack is empty");
        }

        return array_pop($this->items);
    }

    // Returns the top element of the stack without removing it
    public function peek()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException("Stack is empty");
        }

        return $this->items[count($this->items) - 1];
    }
}
