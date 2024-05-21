<?php
require 'controllers/FareController.php';

$controller = new FareController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->getFareQuote();
} else {
    $controller->showForm();
}
?>
