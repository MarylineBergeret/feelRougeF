<?php
session_start();

include '../view/view.header.php';
include '../model/connect.php';
include '../model/get.php';

$users = getAllUser($bdd);
include '../view/v.admin.php';

include '../view/foot.php';
