<!-- 
    1. Užduotis
Magiškuoju kvadratu vadiname kvadratinę natūraliųjų skaičių lentelę, kurios kiekvieno stulpelio, kiekvienos eilutės ir abiejų įstrižainių sumos lygios. Į tekstinį lauką surašoma n*n kvadratinė natūraliųjų skaičių lentelė (kiekvienas skaičius atskiriamas tarpeliu). Parašykite programą, kuri nustatytų, ar duotas kvadratas yra magiškasis ir išvestų į ekraną.
Pavyzdžiui: 

2 9 4
7 5 3
6 1 8
Programa turėtų išvesti jog kvadratas magiškas

12 17 16
12 15 11
14 13 18

Programa turėtų išvesti jog kvadratas nemagiškas 
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pirma užduotis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="mt-4 mb-4">
                <div class="d-flex justify-content-center">
                    <h1>Pirmoji užduotis</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <p> Magiškuoju kvadratu vadiname kvadratinę natūraliųjų skaičių lentelę, kurios kiekvieno stulpelio,
                        kiekvienos eilutės ir abiejų įstrižainių sumos lygios. Į tekstinį lauką surašoma n*n kvadratinė
                        natūraliųjų skaičių lentelė (kiekvienas skaičius atskiriamas tarpeliu).</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Įveskite duomenis</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="data" class="form-label"></label>
                                <textarea name="data" id="data" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-success">Skaičiuoti</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Apskaičiuotas masyvas</div>
                    <div class="card-body">
                        <?php
if (isset($_POST['data'])){
    $dataS=$_POST['data'];  // dataS = string "1 2 3 4 5"
    $dataSR=explode("\n",$dataS);  //is data string rows padaro masyva -> dataSR, \n - skelia per nauja eilute.
    $data=[];
    //  echo $dataSR[0];
    //  echo $dataSR[1];
    //  echo $dataSR[2];
    
    foreach ($dataSR as $t){
        $data[]=explode(" ",$t);
        
    }
//  print_r($data);
    $count=0;
    $istriz1=[];
    $istriz2=[];

   for($i=0; $i<sizeof($data); $i++){
       
        // sumuojame ir palyginame eilutes
        if ((array_sum($data[0])) == (array_sum($data[$i]))){
            $count+=1;
         }
        // sumuojame ir palyginame stulpelius
        if ((array_sum(array_column($data, 0))) == (array_sum(array_column($data, $i)))){
            $count+=1; 
        }
   
        $istriz1[]= $data[$i][$i];
        $istriz2[]= $data[$i][sizeof($data)-$i-1];
      
    }
    // sumuojame ir palyginame istrizaines
    if ((array_sum($istriz1)) == (array_sum($istriz2))){
        $count+=2; 
    }
    
    // Jei teigiamu atsakymu sk. sutampa su formule - magiškas keturkampis
    $sk=count($data);
    if ($count == (2*$sk+2)){
    echo "Magiškas kvadratas! <hr>";   
    }
    else{
    echo "Paprastas kvadratas. <hr>"; 
    }
    
?>
                        <table class="table">
                            <?php foreach ($data as $row){ ?>
                            <tr>
                                <?php foreach($row as $d){ ?>
                                <td><?=$d?></td>
                                <?php } ?>
                            </tr>
                            <?php } ?>
                        </table>
<?php
}

?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>