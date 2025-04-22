<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Page title
$title = "Dashboard";

// Content file to include
$content = "pages/index_content.php";

// Ladda layout
include("layout/layout.php");
