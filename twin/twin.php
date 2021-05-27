<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=score', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}



?>

<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Document</title>
</head>

<body id='body'>
    <div id="container">

        <header>
            <h1 id="title-game"></a>TwinGame</h1>
           
        </header>

        <div id="counter">
            <p>Votre temps est : <span id="time"> 00:00:00</span></p>

            <label for="click" id='click-counter' class='click-counter'>Cliques effectués :</label> <span id="parent-count">0</span>


            <input type="button" class='btn' id='start' value='Commencer'>
            <a href="score.php"><input type="button" class='btn' id='score-page' value='Scores'></a>
            
        </div>


        <main class='game '>


            <input type='button' id='num' class='first-card'>

            <table class='table-twin'>

                <tr>

                    <td><input type='button' id='num0' class='card num' value='1'></td>
                    <td><input type='button' id='num1' class='card num' value='2'></td>
                    <td><input type='button' id='num2' class='card num' value='3'></td>
                    <td><input type='button' id='num3' class='card num' value='4'></td>
                    <td><input type='button' id='num4' class='card num' value='5'></td>
                    <td><input type='button' id='num5' class='card num' value='6'></td>
                </tr>
                <tr>
                    <td><input type='button' id='num6' class='card num' value='7'></td>
                    <td><input type='button' id='num7' class='card num' value='8'></td>
                    <td><input type='button' id='num8' class='card num' value='9'></td>
                    <td><input type='button' id='num9' class='card num' value='1'></td>
                    <td><input type='button' id='num10' class='card num' value='9'></td>
                    <td><input type='button' id='num11' id='num0' class='card num' value='2'></td>


                </tr>
                <tr>
                    <td><input type='button' id='num12' class='card num' value='3'></td>
                    <td><input type='button' id='num13' class='card num' value='4'></td>
                    <td><input type='button' id='num14' class='card num' value='5'></td>
                    <td><input type='button' id='num15' class='card num' value='6'></td>
                    <td><input type='button' id='num16' class='card num' value='7'></td>
                    <td><input type='button' id='num17' class='card num' value='8'></td>


                </tr>

            </table>

            
                <div id='end' class="end">
                    <?php
                    $time= "<span id='final-time'></span>";
                    $score= "<span id='score'></span>";
                    $pseudo = '';
                    // $erreur='';
                    
                    // if(isset($_POST['time'])){
                    //     if(!isset($_POST['pseudo'])  ){
                    //         $erreur ='<p>Vous devez ecrire votre pseudo</p>';
                            
                    //     }else{
                    //         if(strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 12){
                    //             $erreur ='<p>Votre pseudo doit comporter un minimum de 3 character et un maximum de 12 character </p>' ;
                    //         }else{
                    //             header("Location: score.php");
                    //         }
                    //     }
                    //     $pseudo= $_POST['pseudo'];   
                    // $score= $_POST['score'];
                    // $time = $_POST['time'];
                    // }
                    ?>

                    <form action='score.php' method='POST'>
                        <p><label>Votre Pseudo</label><input class='search-bar'type="text" name='pseudo' maxlength="12" value='<?=$pseudo?>' required='required'></p>
                        <input type="hidden" name='time' id='form-time'>
                        
                        <p><label>Votre Temps</label>
                        <?= $time?>
                        </p>
                        <input type="hidden" name='score' id='form-score'>
                        <p><label>Votre Score</label>
                        <?= $score?>
                        </p>
                        <input type="submit" class='btn' value='enregistrer'>
                    </form>

                    <input type="button" class='btn' id='btn-reset' value='Rejouer'>
                </div>


          

        </main>








    </div>






    <script src="./js/twin/twin.js"></script>



</body>

</html>