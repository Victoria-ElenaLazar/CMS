<?php
declare(strict_types=1);

namespace Cms\Controllers;

use Cms\Models\Post;

class PostController
{
    public Post $post;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index(): array
    {
        $posts = $this->post->index();

        $postsPerPage = 3;
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $totalPosts = count($posts);
        $totalPages = ceil($totalPosts / $postsPerPage);

        $startIndex = ($currentPage - 1) * $postsPerPage;
        $endIndex = min($startIndex + $postsPerPage, $totalPosts);

        $pagedPosts = array_slice($posts, $startIndex, $postsPerPage);

        require_once __DIR__ . "/../../public/index.php";
        return $pagedPosts;
    }

    public function search($search): ?array
    {
        return $this->post->search($search);
    }
}