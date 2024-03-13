<?php
declare(strict_types=1);
require_once __DIR__ . "/../vendor/autoload.php";
include __DIR__ . "/../includes/header.php";
include __DIR__ . "/../includes/db.php";
include __DIR__ . "/../includes/search.php";
?>

<!-- Navigation -->
<?php include __DIR__ . "/../includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">Page Heading <small>Secondary Text</small></h1>

            <!-- Display Search Results or All Posts -->
            <?php foreach ($searchResults as $post) : ?>
                <h2>
                    <a href="#"><?php echo $post['post_title']; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post['post_author']; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post['post_date']; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post['post_image']; ?>" alt="">
                <hr>
                <p><?php echo $post['post_content']; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php endforeach; ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include __DIR__ . "/../includes/sidebar.php"; ?>
    </div>
    <!-- /.row -->
    <hr>
    <?php include __DIR__ . "/../includes/footer.php"; ?>
</div>
<!-- /.container -->
