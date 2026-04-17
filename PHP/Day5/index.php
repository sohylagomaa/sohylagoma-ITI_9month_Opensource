<?php
require_once "vendor/autoload.php";

use App\Models\User;


$userModel = new User();
$users = $userModel->get();


include "Views/User/index.php";