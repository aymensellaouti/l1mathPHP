<?php
include_once 'classes/Point.php';
include_once 'classes/PointColoree.php';

$pc = new PointColoree(1,2,'red');
$pc->presentation();

$point1 = new Point(5,10);
$point3 = new Point();
//$point3->presentation();
$point2 = new Point(1);
//$point1->presentation();
//$point2->presentation();
//$point1->translation(4,10);
//$point1->presentation();
//$point2->presentation();
echo Point::getNbPoints();
unset($point1);
echo Point::getNbPoints();
