<?php
declare(strict_types=1);
namespace Cms\Models;

use PDO;

class Category extends A_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): array
    {
        $categories = [];
        $sth = "SELECT * FROM categories ORDER BY cat_id DESC ";
        $stmt = $this->instance->prepare($sth);
        $stmt->execute();

        while ($category = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = [
                'cat_title' => $category['cat_title']
            ];
        }

        return $categories;
    }

}