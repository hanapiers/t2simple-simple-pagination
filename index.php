<?php

require 'T2SimplePagination.php';
require 'Bookshelf.sample.php';

// Get page if it is set
$page = 1;
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

$bookshelf = new Bookshelf();
$pagination = new T2SimplePagination($page, 5, count($bookshelf->booklist));

$books = $bookshelf->getAll($pagination->offset, $pagination->per_page);
?>


<html>
<head>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php if ($books): ?>
<ul class='list-group'>
    <?php foreach ($books as $book): ?>
    <li class='list-group-item'><?php echo $book ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if ($pagination->num_page): ?>
<ul class='pagination'>
    <?php for ($i = 1; $i <= $pagination->num_page; $i++): ?>
    <li><a href='?p=<?php echo $i ?>'><?php echo $i ?></a></li>
    <?php endfor; ?>
</ul>
<?php endif; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
