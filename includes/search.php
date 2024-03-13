<?php
declare(strict_types=1);

use Cms\Controllers\PostController;
use Cms\Controllers\CategoryController;

$postController = new PostController();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["search"])) {
    $searchResults = $postController->search($_POST["search"]);
} else {
    // If not, display all posts
    $searchResults = $postController->index();
}

$categoryController = new CategoryController();
$categories = $categoryController->index();