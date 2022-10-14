<?php

namespace App\Controllers;

use App\Models\DataBase;
use App\Models\CoreModel;

use PDO;
use PDOException;

class DataBaseController {

    function create()
    {
        $newDataBase = DataBase::new();
        return $newDataBase;
    }
}