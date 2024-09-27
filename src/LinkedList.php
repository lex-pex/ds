<?php

namespace DataStructures;

use DataStructures\Node;

class LinkedList extends Collection
{
    private $head = null;
    private $tail = null; // Optional tail reference for better efficiency in certain operations

    public function add($value): void
    {
        $newNode = new Node($value);
        if ($this->head === null) {
            // First node
            $this->head = $newNode;
            $this->tail = $newNode; // Optional tail initialization
        } else {
            $current = $this->tail; // Use tail for faster appends
            $current->next = $newNode;
            $newNode->previous = $current; // Set previous link
            $this->tail = $newNode; // Update tail to the new node
        }

        $this->items[] = $value; // Update the items in Collection (parent class)
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

    // Additional methods (get, set, etc.) can be added here
}
