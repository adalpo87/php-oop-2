<?php 
  require_once __DIR__ . "/classes/User.php";
  require_once __DIR__ . "/classes/Product.php";
  require_once __DIR__ . "/classes/UserPrime.php";

  $user1 = new UserPrime("Ugo", "De Ughi", "21", "Via dei peni piccoli 12");
  
  $user1->numeroCarta=22223;
  $user1->cvv=321;
  $user1->scadenza="05/21";
  //var_dump($user1);

  $user2 = new UserPrime("Roberto", "Dal Ponte", "66", "Via Fabrizio é bellissimo 94");
  $user2->setType("normal");
  $user2->numeroCarta=123456;
  $user2->cvv=123;
  $user2->scadenza="07/21";
  $user2->setType("");
  
  //var_dump($user2);

  $prodotto1 = new Product("alimentare", "acido muriatico", 0.99);
  $prodotto1->setScadenza("mai");
  //var_dump($prodotto1);
  $prodotto2 = new Product("casalinghi", "sapone di francese", 3.99);
  $prodotto2->setScadenza("mai");
  $prodotto3 = new Product("alimentare", "salame di Latina", 10.99);
  $prodotto3->setScadenza("20:07:2021");
  $prodotto4 = new Product("elettronica", "led streamer", 199.99);
  $prodotto4->setScadenza("mai");
  $prodotto5 = new Product("alimentare", "Gatto alla vicentina", 29.99);
  $prodotto5->setScadenza("27:06:2021");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <h1>Carrello di : <?php echo $user1->name ?></h1>

  <ul>
    <li>
      <?php echo $prodotto1->name . " " . $prodotto1->price ?>
    </li>
    <li>
      <?php echo $prodotto2->name . " " . $prodotto2->price ?>
    </li>
    <li>
      <?php echo $prodotto3->name . " " . $prodotto3->price ?>
    </li>
    <li>
      <?php echo $prodotto4->name . " " . $prodotto4->price ?>
    </li>
  </ul>
  <?php $tot = $prodotto1->price + $prodotto2->price + $prodotto3->price + $prodotto4->price  ?>
  <h4>Totale carrello: <?php echo $tot= $tot*$user1->getDiscount() ?> </h4>  
  
  <h2> Dati pagamento:  </h2>
  <ul>
    <li>
      <?php echo $user1->numeroCarta ?>
    </li>
    <li>
      <?php echo $user1->cvv ?>
    </li>
    <li>
      <?php echo $user1->scadenza ?>
    </li>
  </ul>

  <h1>Controllo pagamento</h1>
  <p>
    <?php echo $user1->control($user1->cvv, $user1->numeroCarta, $user1->scadenza ); ?>
  </p>
  
  <h2>Spedito a:</h2>
  <p><?php echo $user1->address ?></p>
  
  
  
  
  <br><br><br>
  ---------------------------------------------------------------------------
  <h1>Carrello di : <?php echo $user2->name ?></h1>

  <ul>
    <li>
      <?php echo $prodotto1->name . " " . $prodotto1->price ?>
    </li>
    <li>
      <?php echo $prodotto2->name . " " . $prodotto2->price ?>
    </li>
    <li>
      <?php echo $prodotto5->name . " " . $prodotto5->price ?>
    </li>
    <li>
      <?php echo $prodotto4->name . " " . $prodotto4->price ?>
    </li>
  </ul>
   
  <?php $tot = $prodotto1->price + $prodotto2->price + $prodotto5->price + $prodotto4->price  ?>
  <h3>Hai diritto allo sconto del <?php echo (1- $user2->getDiscount())*100 ?> % essendo un vecchio</h3>
  <h4>Totale carrello: <?php echo $tot= $tot*$user2->getDiscount() ?> </h4>  
  
  <h2> Dati pagamento:  </h2>
  <ul>
    <li>
      <?php echo $user2->numeroCarta ?>
    </li>
    <li>
      <?php echo $user2->cvv ?>
    </li>
    <li>
      <?php echo $user2->scadenza ?>
    </li>
  </ul>
  
  
  
  
  <h2>Controllo pagamento</h2>
  <p>
    <?php echo $user2->control($user2->cvv, $user2->numeroCarta, $user2->scadenza ); ?>
  </p>

  <h2>Spedito a:</h2>
  <p><?php echo $user2->address ?></p>
</body>
</html>