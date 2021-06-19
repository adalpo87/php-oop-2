<?php 
  require_once __DIR__ . "/Payment.php";
 
  class User{
    use Payment;
    public $name;
    public $surname;
    public $age;
    public $address;
    protected static $contUsers=0;
    
    

  public function __construct($_name, $_surname, $_age, $_address){
    $this->name = $_name;
    $this->surname = $_surname;
    $this->age = $_age;
    $this->address = $_address;
    self::$contUsers++;
  }

  static function getContUsers(){
    return self::$contUsers;
  }



  private function controlCvv($_cvv){
   
    if(!is_int($_cvv) ){
      
      throw new Exception("Dati inseriti del cvv errati devi inserire solo numeri" . " "); 
    }
  }
  private function controlCarta($_numeroCarta){
   
    if(!is_int($_numeroCarta)){
      
      throw new Exception("Dati inseriti del numero carta sono errati devi inserire solo numeri" . " "); 
    }
  }
  private function controlScadenza($_scadenza){
    if($_scadenza < date("m:y")){

      throw new Exception("La carta é scaduta" . " ");
      
    }else{
      echo "Pagamento effettuato" . " ";
    }
  }

  public function control($_cvv, $_numeroCarta, $_scadenza){
    
    try{
      
      $this->cvv = $this->controlCvv($_cvv);
      $this->numeroCarta = $this->controlCarta($_numeroCarta);
      $this->scadenza = $this->controlScadenza($_scadenza);
    }catch(Exception $e){
      
      echo $e->getMessage();
    }

  }

}


?>