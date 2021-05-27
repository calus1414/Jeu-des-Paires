<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=score', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}


$pseudo_less ='';
if (isset($_POST['pseudo']) ) {
    // if(!empty($_POST['pseudo'])){
    //     $pseudo_less ='';
    // }
    $pseudo = htmlentities($_POST['pseudo']);
    $time = $_POST['time'];
    $score = (int)$_POST['score'];
    $date = date('Y-m-j');




    $send = $bdd->query("INSERT INTO visiteur VALUES('','$pseudo','$date','$score','$time') ");
}
$search = ' order by score';
$search_pseudo = "1";
$count = 0;
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
<?php
$pseudo_value = '';
$checked_click_on = '';
$checked_click_off = '';
$checked_time_on = '';
$checked_time_off = '';




$search_array = [];
if (isset($_POST['search-time']) || isset($_POST['search-click']) || isset($_POST['search-pseudo'])) {

    $pseudo_value = htmlentities($_POST['search-pseudo']);
    if (isset($_POST['search-time'])) {
        $search = "";

        if ($_POST['search-time'] === "le plus court") {

            $checked_time_off = 'checked';
            $search_array[] = " temp";
        } else {
            $search_array[] = " temp DESC";
            

            $checked_time_on = 'checked';
        }
    }
    if (isset($_POST['search-click'])) {

        if ($_POST['search-click'] === "le plus de clique") {
            $checked_click_on = 'checked';

            $search_array[] = " score DESC";
        } else {
            $search_array[] = " score ";
            $checked_click_off = 'checked';
        }
    }
    
    if (count($search_array) > 1) {
        $search = ' order by' . implode(',', $search_array);
    } elseif (count($search_array) === 1) {
        $search = ' order by' . $search_array['0'];
    }


    if (isset($_POST['search-pseudo'])) {

        $search_pseudo = " pseudo like '%" . htmlentities($_POST['search-pseudo']) . "%'";
    }
}


?>

<body>

    <div class="container-score">



        <div class='search'>
            <h1 class='title'>Score</h1>

            <a href="twin.php"><input type="button" class='btn' value='jeu'></a>
            <form method='POST'>


                <input class='search-bar' type="text" placeholder="Taper un pseudo..." name="search-pseudo" maxlength="12" value='<?= $pseudo_value ?>'>
                <button type="submit" class='btn'>Rechercher</button>
                <div class='click-choice'>
                    <label for="click" class='form-class'>le plus de clique</label><input type='radio' name='search-click' value="le plus de clique" <?= $checked_click_on ?>>
                    <label for="click" class='form-class'>le moin de clique</label><input type='radio' name='search-click' value="le moin de clique" <?= $checked_click_off ?>>
                </div>
                <div class='time-choice'>
                    <label for="time" class='form-class'>le plus long</label><input type='radio' name='search-time' value="le plus long" <?= $checked_time_on ?>>
                    <label for="time" class='form-class'>le plus court</label><input type='radio' name='search-time' value="le plus court" <?= $checked_time_off ?>>
                </div>

            </form>

        </div>

        <div class="score">
            <?php

            $call = $bdd->query("SELECT * FROM visiteur WHERE " . $search_pseudo . $search . "");
            ?>
            <table class='tab-score'>
                <tr>

                    <th class='case-score'>Pseudo</th>
                    <th class='case-score'>Cliques</th>
                    <th class='case-score'>Temps</th>
                    <th class='case-score'>Date</th>
                </tr>
                <?php
                while ($donnees = $call->fetch()) {
                    $count += 1;
                    echo "<tr >
    
    <td class='case-score'><strong>" . $donnees['pseudo'] . "</strong></td>
    <td class='case-score'>" . $donnees['score'] . "</td>
    <td class='case-score'>" . $donnees['temp'] . "</td>
    <td class='case-score'>" . $donnees['date'] . "</td>
    </tr>";
                }
                if ($count === 0) {
                    echo "<td class='case-score'>Pseudo introuvable...</td>";
                    
                }
                ?>
            </table>

        </div>


    </div>




</body>

</html>