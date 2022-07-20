<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order words</title>
    <style>

        *{

            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;

        }

        /* main{

            margin-left: 12.5%;
            margin-right: 12.5%;

            display: flex;
            flex-direction: column;

        } */

        form{

            margin-left: 12.5%;
            margin-right: 12.5%;

            display: flex;
            flex-direction: column;

        }

        .form-container{

            width: 50%;
            background-color: rgba(160, 221, 95, 0.599);
            width: 187.500px;

        }

        .request-container{

            width: 50%;
            background-color: rgba(160, 221, 95, 0.599);
            width: 187.500px;
            padding-top: 15px;

        }

        .title{

            font-size: 32px;
            font-weight: bold;
            text-align: center;
            color: #fff;

        }

        h1{

            background-color: rgb(148, 36, 222);

        }

        .flexbox-container {
        display: -ms-flex;
        display: -webkit-flex;
        display: flex;
        }

        .flexbox-container > div {
                width: 50%;
                padding: 10px;
        }

        .flexbox-container > div:first-child {
                margin-right: 20px;
        }

        .correct{

            height: 25px;
            text-align: center;
            background-color: rgb(157, 244, 147);
            border-radius: 5px;

        }

        .correct p{

            margin-top: 0px;
            margin-bottom: 0px;

        }

        .incorrect{

            height: 25px;
            text-align: center;
            background-color: rgb(244, 147, 147);
            border-radius: 5px;

        }

        .incorrect p{

            margin-top: 0px;
            margin-bottom: 0px;

        }

        div br{

            height: 0px;

        }


    </style>
</head>

<?php

/* print_r($_REQUEST);
foreach ($_REQUEST as $key => $value) {
    
    

} */

$palabras = array("Sol", "Luna", "Cielo", "Luz", "Estrellas", "Lluvia");
$palabrasDesordenadas = array();
$stop = count($palabras);

$form = "<form action='main.php'>";
$button = "<button type='submit'>Enviar</button>
</form>"; 


/* Desordenar palabras */

for ($i=0; $i <= $stop; $i++) { 
    
    

    if ($i < $stop){

        $form .= "La palabra es: ". str_shuffle($palabras[$i])." ".
        "<input type='text' name='palabra[$i]'>". "<br>";

    }else{

        $form .= $button; 

    }

}

$responseContent = '';
$request = [];
foreach ($_REQUEST as $key => $value) {
    
    
    foreach ($value as $key => $word) {
        array_push($request, $word);
    } 

}

if(count($_REQUEST) != 0){

    for ($i=0; $i < $stop; $i++) { 
    
        if(($request[$i]) == ($palabras[$i])){
    
            $responseContent .= "<p class='correct'> La palabra ingresada $palabras[$i] es <b>correcta</b>.</p> "; 
    
        }else{
    
         
            $responseContent .= "<p class='incorrect'> La palabra ingresada $request[$i] es <b>incorrecta</b>, la <b>correcta</b> es $palabras[$i].</p> "; 
        
        }
    
    }

}

/* print_r($palabrasDesordenadas); */

echo "

<body>

    <header>

    <h1 class='title'>

        ¡ORDER WORDS!

    </h1>

    </header>

    

    <main class='flexbox-container'>

        <div> 

            $form

        </div>

        <div>

            $responseContent

        </div>

    </main>
    
</body>
</html>

";

?>

