<?php
declare(strict_types=1);

namespace Cms\Models;
use PDO;

class Post extends A_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): array
    {
        $posts = [];
        $sth = "SELECT * FROM posts ORDER BY post_id DESC ";
        $stmt = $this->instance->prepare($sth);
        $stmt->execute();

        while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = [
                'post_title' => $post['post_title'],
                'post_author' => $post['post_author'],
                'post_date' => $post['post_date'],
                'post_image' => $post['post_image'],
                'post_content' => $post['post_content']
            ];
        }

        return $posts;
    }

    public function search(string $search): array
    {
        $posts = [];
        $sth = "SELECT * FROM posts WHERE post_tags LIKE :search";
        $stmt = $this->instance->prepare($sth);
        $stmt->bindValue(':search', "%$search%");
        $stmt->execute();

        while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = [
                'post_title' => $post['post_title'],
                'post_author' => $post['post_author'],
                'post_date' => $post['post_date'],
                'post_image' => $post['post_image'],
                'post_content' => $post['post_content'],
            ];
        }

        return $posts;
    }
}
