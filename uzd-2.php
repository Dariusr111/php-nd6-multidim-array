<!-- 
   2. Užduotis

Faile skelbimai.php yra pateikti įvairūs skelbimai.
Kiekvienas skelbimas turi:
id – unikalus numeri,
text - tekstas,
cost – kaina
onPay - (timestam kuris nurodo kada buvo sumokėta, jei 0 tuomet nebuvo sumokėta).
Norint atvaizduoti timestamp kaip datą galime naudoti funkciją date, jos aprašas: http://php.net/manual/en/function.date.php
Sukurkite puslapį kuriame būtų tvarkingai atvaizduoti visi šie skelbimai.

Puslapio apačioje turėtų rašyti:
Kiek išviso yra skelbimų
Kiek skelbimų yra apmokėtų
Kokia suma yra gauta už skelbimus (suma kainos tų skelbimų kurie yra apmokėti)
Kokia suma dar turėtų būti apmokėta 
 -->



<?php 
include 'skelbimai.php';
// print_r($skelbimai);
date_default_timezone_set('UTC');
$count=0;
$apm=0;
$neapm=0;
$suma_a=0;
$suma_n=0;
foreach ($skelbimai as $value){
   if ($value['onPay'] != 0){
      $value['onPay']=date("Y-m-d H:i:s");
      $apm+=1;
      $suma_a=$suma_a+$value['cost'];
   }
   else {
      $value['onPay']='Neapmokėtas';
      $neapm+=1;
      $suma_n=$suma_n+$value['cost'];
   }
   
   $count+=1;
   
// Pakeičiam Headingo tekstą
   $value['ID']=$value['id'];
   $value['Skelbimas']=$value['text'];
   $value['Kaina']=$value['cost'];
   $value['Apmokėtas']=$value['onPay'];
   unset($value['id']);
   unset($value['text']);
   unset($value['cost']);
   unset($value['onPay']);

   
   // print_r ($value);
   // echo "<p>The capital of $country is $capital</p>";

   $skelb_updated[]=$value;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Skelbimai</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <style>
      .text span {
         font-weight: bold;
      }


   </style>

</head>

<body>

   <?php if (count($skelbimai) > 0): ?>
   <div class="container">
      <table class="table table-striped table-hover mb-3">
         <thead>
            <tr>
               <th><?php echo implode('</th><th>', array_keys(current($skelb_updated))); ?></th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($skelb_updated as $row): array_map('htmlentities', $row); ?>
            <tr>
               <td><?php echo implode('</td><td>', $row); ?></td>
            </tr>

            <?php endforeach; ?>

         </tbody>
      </table>
      <div class="d-flex justify-content-center mt-5 mb-5">
         <div class="flex-column">
            <div class="text">
               <p>Iš viso skelbimų: <span style="color:blue"><?php echo $count; ?></span></p>
            </div>
            <div class="text">
               <p>Apmokėtų skelbimų: <span style="color:green"><?php echo $apm; ?></span></p>
            </div>
            <div class="text">
               <p>Suma už apmokėtus: <span style="color:green"><?php echo $suma_a; ?></span></p>
            </div>
            <div class="text">
               <p>Turi būt apmokėta: <span style="color:red"><?php echo $suma_n; ?></span></p>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>




</body>

</html>