<?php
    $user = mysqli_fetch_array(mysqli_query($adb,   "
                                                    SELECT * FROM user WHERE uid='$_SESSION[uid]'
                                                    "));

    $rendeles = mysqli_query($adb, "
                                    SELECT * FROM rendeles WHERE ruid='$_SESSION[uid]'
                                    ");

?>

<div class="main_content">
    <div>
    <div id="profil">
        <img src="PROFILKEPEK/<?=$user['uprofilkep'];?>" alt="placeholder">
        <form id="kep" method="post" action="kepvalt.php" enctype='multipart/form-data'>
        <label style="cursor:pointer;" for="pp" class="btn">Kép választás</label>
            <input id="pp" name="pp" type="file" accept="image/gif, image/jpg, image/jpeg, image/png, image/webp">
            <input type='hidden' name='ustrid' value='<?=$user['ustrid'];?>'>                                  
            <input type="submit" value="Feltöltés">        
        </form>
        <h1>Üdvözlet, <?=$_SESSION['unev'];?>!</h1>
        <!--Random inspiralo quote?-->
        <p><?=$quoteText;?><p>

    </div>

    <div id="bmi">
        <h1>BMI kalkulátor</h1>
        <form method="post" action="bmi.php">
        <label for="height">Magasság (cm): </label>
        <input id="height" type="text" name="height" min="0" max="1000" required/> <br/>
        <label for="mass">Testtömeg (kg): </label>
        <input id="mass" type="number" name="mass" min="0" max="1000" required/> <br/>
        <input name="bmiszmtas" type="submit" value="Ok"/>
        </form>
    </div>

    </div>
    <div id="adatok">
        <table>
            <tr>
                <td>
                    Teljes név:
                </td>
                <td>
                    <?=$user['uvezetek'];?> <?=$user['ukereszt'];?>
                </td>
            </tr>
            <tr>
                <td>
                    Nem:
                </td>
                <td>
                    <?=$user['unem'];?>
                </td>
            </tr>
            <tr>
                <td>
                    E-mail
                </td>
                <td>
                    <?=$user['umail'];?>
                </td>
            </tr>
            <tr>
                <td>
                    Telefonszám:
                </td>
                <td>
                    <?=$user['utel'];?>
                </td>
            </tr>
            <tr>
                <td>
                    Lakcím:
                </td>
                <td>
                    <?=$user['uiranyito'];?> <?=$user['uvaros'];?> <?=$user['ucim'];?> <?=$user['utovabbicim'];?>
                </td>
            </tr>
        </table>
        <input type='button' value='Adatok szerkesztése' onclick='location.href="./?p=adatvalt"'>
        <input type='button' value='Kijelentkezés' onclick='location.href="logout.php"'>
    </div>
    <div id="rendelesek">
        <h1>Eddigi rendelések</h1>
        <div id="rendeles">
            <ul>
                <?php 
                while($rendelesek = mysqli_fetch_array ($rendeles)) {
                    $termek = mysqli_fetch_array (mysqli_query( $adb , "
                                SELECT * 
                                FROM   termekek
                                WHERE tid = '$rendelesek[rtid]'
                                " )) ;
                    print "
                    <li>$rendelesek[rid]. rendelés: $termek[tnev], $rendelesek[rdb]db, $rendelesek[rdatum]</li>
                    ";
                }
                ?>
            </ul>
        </div>
    </div>
</div>