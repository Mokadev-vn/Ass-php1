<?php
require_once '../libs/config.php';
role();

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$showMenu = isset($_POST['showMenu']) ? trim($_POST['showMenu']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';

if ($name == '') {
    $_SESSION['error'] = "Tên danh mục không được để trống!";
    header("Location: ". BASE_URL ."category/add.php");
    die();
}

if($showMenu != 0 && $showMenu != 1) {
    $_SESSION['error'] = "Mày định bug à!";
    header("Location: ". BASE_URL ."category/add.php");
    die();
}


$table = "categories";
$data  = [
    'name'        =>  $name,
    'show_menu'   =>  $showMenu,
    'description' =>  $description
];

$result = insert($table, $data);

if ($result) {
    $_SESSION['success'] = "Đã tạo thành công danh mục $name";
    header("Location: ". BASE_URL ."category");
    die();
}

$_SESSION['error'] = "Có lỗi xảy ra vui lòng thực hiện lại!";
header("Location: ". BASE_URL ."category");
