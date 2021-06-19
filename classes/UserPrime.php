<?php 
  require_once __DIR__ . "/User.php";
  class UserPrime extends User{
    private $type="normal";
    private $discount=1;
    public $freeDelivery="no";

    public function __construct($_name, $_surname, $_age, $_address)
    {
      
      parent::__construct($_name, $_surname, $_age, $_address);
      
    }
    
    public function calcDiscount(){
      if($this->type === "premium" && $this->age > 65){
        $this->discount=0.75;
        $this->freeDelivery="si";
      }elseif ($this->type === "premium") {
        $this->discount=0.85;
        $this->freeDelivery="si";
      }elseif ($this->age > 65) {
        $this->discount=0.90;
      }
    }  

    public function setType($_type){
      $this->type=$_type;
      $this->calcDiscount();
    }  

    public function getType(){
      return $this->type;
    }
    
    public function getDiscount(){
      return $this->discount;
    }
  }

  
?>