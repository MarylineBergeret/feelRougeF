<?php
session_start();

include '../view/view.header.php';
include '../model/connect.php';
include '../model/get.php';
include '../view/v.admin.php';


getAllUser($bdd);


include '../view/foot.php';
