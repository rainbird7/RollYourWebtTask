<?php


class Round{
    private $name;
    private $scored;
    private $stableford_points;
    private $hole_name;
    private $hole_number;
    private $par_score;
    private $par_name;

    function __construct($name, $scored, $stableford_points, $hole_name, $hole_number, $par_score, $par_name){
        $this->name = $name;
        $this->scored = $scored;
        $this->stableford_points = $stableford_points;
        $this->hole_name = $hole_name;
        $this->hole_number = $hole_number;
        $this->par_score =$par_score;
        $this->par_name = $par_name;
    }

    public function __getName(){
        return $this->name;
    }

    public function __getScored(){
        return $this->scored;
    }

    public function __getAllStablefordPoints(){
        return $this->stableford_points;
    }

    public function __setName($name){
        $this->name = $name;
    }

    public function __setScored($scored){
        $this->scored = $scored;
    }

    public function __setAllStablefordPoints($points){
        $this->stableford_points = $points;
    }


    public function __getHoleName(){
        return $this->hole_name;
    }

    public function __getHoleNumber(){
        return $this->hole_number;
    }

    public function __getPAR(){
        return $this->par_score;
    }

    public function __getParName(){
        return $this->par_name;
    }


    public function __setHoleName($name){
        $this->hole_name = $name;
    }

    public function __setHoleNumber($number){
        $this->hole_number = $number;
    }

    public function __setPAR($par){
        $this->par_score = $par;
    }
}