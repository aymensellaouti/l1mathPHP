<?php

class Point
{
    protected $x;
    protected $y;
    private static $nbPoint = 0;
    const PI = 3.14;
    public function __construct($abs = 0, $ord = 0)
    {
        $this->x = $abs;
        $this->y = $ord;
        echo 'Dans le constructeur<br>';
        self::$nbPoint++;
    }
    public function __destruct()
    {
        self::$nbPoint--;
    }
    /**
     * return void
     * permet de présenter un point
     */
    function presentation() {
        echo "Je suis un point et mes coordonnées sont". $this->x ."et ". $this->y.'<br>';
    }
    function translation($i, $j) {
        $this->x += $i;
        $this->y += $j;
    }
    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }
    /**
     * @param int $x
     */
    public function setX(int $x)
    {
        $this->x = $x;
    }
    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }
    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }
    public static function getNbPoints()
    {
        echo self::$nbPoint;
    }
}