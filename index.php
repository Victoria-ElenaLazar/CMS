
<?php
include __DIR__ . "/includes/header.php";
include __DIR__ . "/includes/db.php";

?>
    <!-- Navigation -->
<?php
include __DIR__ . "/includes/navigation.php";

?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                $query = "SELECT * FROM posts";
                $allPosts = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($allPosts)){
                    $postTitle = $row['post_title'];
                    $postAuthor = $row['post_author'];
                    $postDate = $row['post_date'];
                    $postImage = $row['post_image'];
                    $postContent = $row['post_content'];
                    ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $postTitle ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $postImage; ?>>" alt="">
                <hr>
                <p><?php echo $postContent ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php
                }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
            include __DIR__ . "/includes/sidebar.php";
            ?>
        </div>
        <!-- /.row -->
        <hr>
<?php

include __DIR__ . "/includes/footer.php";
