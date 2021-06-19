<?php

  class Product{
   
      public $genre;
      public $name;
      public $price;
      private $scadenza;

    
   


    public function __construct($_genre, $_name, $_price ){
      
      $this->genre = $_genre;
      $this->name = $_name;
      $this->price = $_price;
      
    

    }

    public function setScadenza($_scadenza){
      $this->scadenza = $_scadenza;
    }

    public function getScadenza(){
      return $this->scadenza;
    }
  }

  

?>