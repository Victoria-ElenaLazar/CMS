<?php
declare(strict_types=1);
namespace Cms\Models;

use PDO;
use Exception;
use Cms\App\DB;

class A_Model
{
    protected ?PDO $instance;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->instance = DB:: getInstance();
    }


}
