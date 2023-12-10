<?php

class Area{

public $base;
public $altura_rectangulo;
public $area_rectangulo;
public $altura_completa;
public $altura_triangulo;
public $area_triangulo;
public $area_terreno;

public function CalcularAreaRectangulo($b,$c){

    $this->base = $b;
    $this->altura_rectangulo = $c;
    
    $this->area_rectangulo = ($this->base * $this->altura_rectangulo);

     return $this->area_rectangulo;

}
public function CalcularAreaTriangulo($b,$c,$a){

    $this->base = $b;
    $this->altura_rectangulo = $c;
    $this->altura_completa = $a;
    $this->altura_triangulo = ($this->altura_completa - $this->altura_rectangulo);

    $this->area_triangulo = ($this->altura_triangulo * $this->base)/2;

   return $this->area_triangulo;

}
}

