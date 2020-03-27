<?php
include_once 'Point.php';

class PointColoree extends Point
{
    public function __construct($abs = 0, $ord = 0, $color)
    {
        echo $this->x;
        parent::__construct($abs, $ord);
        $this->color = $color;
    }

    private $color;
}