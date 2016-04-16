<?php
require 'T2SimplePagination.php';
require 'Bookshelf.sample.php';

// Get page if it is set
$page = isset($_GET['p']) ? $_GET['p'] : 1;

$bookshelf = new Bookshelf();
$pagination = new T2SimplePagination($page, 5, $bookshelf->countItems());

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

    <?php if ($pagination->prev_page): ?>
        <li><a href='?p=<?php echo $pagination->prev_page ?>' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>
    <?php else: ?>
        <li class="disabled"><span aria-hidden='true'>&laquo;</span></li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $pagination->num_page; $i++): ?>
        <?php if ($pagination->page == $i): ?>
            <li class="active"><a href='?p=<?php echo $i ?>'><?php echo $i ?></a></li>
        <?php else: ?>
            <li><a href='?p=<?php echo $i ?>'><?php echo $i ?></a></li>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($pagination->next_page): ?>
        <li><a href='?p=<?php echo $pagination->next_page ?>' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>
    <?php else: ?>
        <li class="disabled"><span aria-hidden='true'>&raquo;</span></li>
    <?php endif; ?>

</ul>
<?php endif; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
