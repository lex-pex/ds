<?php

namespace DataStructures;

class Node
{
    public $value;
    public $next;
    public $previous;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
        $this->previous = null;
    }
}
