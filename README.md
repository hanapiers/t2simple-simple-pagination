T2Simple-Pagination
==========================

PHP Simple Pagination with Bootstrap 3

## Installation

```php
require 'T2SimplePagination.php';
```

## Usage

```php
$page = 1;		// current page
$per_page = 5;	// number of items to display per page
$total = 100;	// total number of records

$pagination = new T2SimplePagination($page, $per_page, $total);

$query = "SELECT * FROM my_table LIMIT {$pagination->offset}, {$pagination->per_page}";
```

## Bootstrap Usage

```php
<?php if ($pagination->num_page): ?>
<ul class='pagination'>
    <?php for ($i = 1; $i <= $pagination->num_page; $i++): ?>
    <li><a href='?p=<?php echo $i ?>'><?php echo $i ?></a></li>
    <?php endfor; ?>
</ul>
<?php endif; ?>
```

## Properties

`total` - the total number of records in the pagination

`page` - the current page, if not set the default value is 1

`per_page` - the number of items per page, if not set the default value is 10

`num_page` - the number of pages to display, if not set the default value is 0

`offset` - the index to be used when selecting specific range from the records

