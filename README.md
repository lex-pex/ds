# PHP Data Structures Library

A simple library implementing common data structures in PHP. This project is built around a `Collection` base class and includes various data structures like `LinkedList`.

## Features

- Linked List (Singly Linked List) implementation.
- `Collection` base class to provide common functionality across all data structures.

## Installation

You can clone the repository to your local environment.

### Make sure you have Composer installed, then run:

```bash:
git clone https://github.com/your-username/ds.git
cd ds
composer install
```
## Usage

### LinkedList Example

``` php
use DataStructures\LinkedList;

$linkedList = new LinkedList();
$linkedList->add(10);
$linkedList->add(20);
$linkedList->remove(10);
echo $linkedList->size(); // Outputs: 1
```

## Basic Structure

- src/
- ── Collection.php
- ── LinkedList.php
- tests/
- ── LinkedListTest.php
- README.md
- composer.json
- .gitignore

## Contributing

Feel free to fork this repository and submit pull requests! Any contributions are welcome.

### Roadmap

- Add more data structures: Stacks, Queues, Hashmaps, Trees, and Graphs.
- Optimize and improve performance for large-scale data handling.
- Add unit tests for all data structures.
- Provide benchmarking for time complexity of each operation.

## License

This project is licensed under the MIT License.










