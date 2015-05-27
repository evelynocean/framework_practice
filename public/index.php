<?php
include_once __DIR__ . "/../autoload.php";

echo '<hr>here index<br>';

$email = new Core\Classes\Member();
$email->getMember();

$mem1 = new Core\Classes\Member\Member1();
$mem1->getMember1();

$mem2 = new Core\Classes\Member\Member2();
$mem2->getMember2(1234567);

$email = new Core\Classes\Email();
$email->getEmail();

$arr = new Core\Classes\Arr();
$arr->getArr();

$view = new Core\Classes\View();
$view->getView();

$aa = new First();
$aa->getFirst();

$bb = new Second();
$bb->getSecond();


$no = new Nonamespace();
$no->getNonamespace();


