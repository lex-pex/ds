<?php

namespace DataStructures;

use DataStructures\Node;

class LinkedList extends Collection
{
    private ?Node $head = null;
    private ?Node $tail = null; // Optional tail ref for efficiency in certain operations
    private int $size = 0;

    public function add($value): void
    {
        $newNode = new Node($value);
        if ($this->head === null) 
        { // First node
            $this->head = $newNode;
            $this->tail = $newNode; // Optional tail init
        } else {
            $current = $this->tail; // Use tail for faster appends
            $current->next = $newNode;
            $newNode->previous = $current; // Set prev link
            $this->tail = $newNode; // Update tail to the new node
        }

        $this->items[] = $value; // Update the items in Collection
    }

    public function remove($value): bool
    {
        if ($this->head === null) {
            return false;
        }

        if ($this->head->value === $value) {
            // Removing the head node
            $this->head = $this->head->next;
            if ($this->head !== null) {
                $this->head->previous = null; // Clear the previous link of the new head
            } else {
                $this->tail = null; // If the list is now empty, also reset the tail
            }
            return true;
        }

        $current = $this->head;
        while ($current !== null) {
            if ($current->value === $value) {
                if ($current->next !== null) {
                    $current->next->previous = $current->previous; // Update the previous link of the next node
                } else {
                    $this->tail = $current->previous; // If removing the tail, update it
                }
                
                if ($current->previous !== null) {
                    $current->previous->next = $current->next; // Update the next link of the previous node
                }
                
                return true;
            }
            $current = $current->next;
        }

        return false;
    }

    public function size(): int
    {
        return parent::size(); // Size from the parent class
    }

    public function get(int $position)
    {
        if ($position < 0 || $position >= $this->size) {
            throw new \OutOfBoundsException("Invalid position.");
        }

        return $this->getNode($position)->data;
    }

    public function set($data, int $position)
    {
        if ($position < 0 || $position >= $this->size) {
            throw new \OutOfBoundsException("Invalid position.");
        }

        $this->getNode($position)->data = $data;
    }

    private function getNode(int $position)
    {
        $current = $this->head;
        $index = 0;

        while ($current !== null && $index < $position) {
            $current = $current->next;
            $index++;
        }

        return $current;
    }

    public function insert($data, int $position = null)
    {
        $newNode = new Node($data);

        if ($position === null || $position >= $this->size) {
            // Append to the end if no position is given or position is greater than the size
            $this->append($data);
            return;
        }

        if ($position === 0) {
            // Insert at the head
            $newNode->next = $this->head;
            $this->head = $newNode;
        } else {
            // Insert at the specific position
            $previous = $this->getNode($position - 1);
            $newNode->next = $previous->next;
            $previous->next = $newNode;
        }

        $this->size++;
    }

    public function append($data)
    {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $this->tail->next = $newNode;
        }

        $this->tail = $newNode;
        $this->size++;
    }

}
