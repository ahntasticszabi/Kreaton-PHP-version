<?php 
    $user = mysqli_fetch_array(mysqli_query($adb,"
                            SELECT * FROM user WHERE uid='$_SESSION[uid]'
                        "));
?>

<div class="main_content">
    <form action="adatszerk_ir.php" method="post">
        <div>
            <legend>Adataid</legend>
            <label for="vezetek">Vezetéknév:</label><br/><br/>
            <input id="vezetek" type="text" name="uvezetek" placeholder="hati..."/> <br/><br/>
            <label for="kereszt">Keresztnév:</label><br/><br/>
            <input id="kereszt" type="text" name="ukereszt" placeholder="Ferenc..."/> <br/><br/>
            <label for="tel">Telefonszám:</label><br/><br/>
            <input id="tel" type="tel" name="utel" placeholder="éééérted... ide a tehefonszámkell"/> <br/><br/>
            <label for="varos">Város:</label><br/><br/>
            <input id="varos" type="text" name="uvaros" placeholder="Budapest..."/> <br/><br/>
            <label for="iranyito">Irányítószám:</label><br/><br/>
            <input id="iranyito" type="text" name="uiranyito" placeholder="6969..."/> <br/><br/>
            <label for="cim">Utca, Házszám:</label><br/><br/>
            <input id="cim" type="text" name="ucim" placeholder="kiss utca 17/A..."/> <br/><br/>
            <label for="nem">nemed:</label><br/><br/>
            <input id="nem" type="text" name="unem" placeholder="fiú,lány,zsömle..."/> <br/><br/>
            <input type='hidden'    name='ustrid'   value='<?=$user['ustrid'];?>'><br>
            <input type="submit" value="Fejtöltés"/>
        </div>
    </form>
</div>