<?php

if($belepve == 1)   $user = mysqli_fetch_array(mysqli_query($adb,   "
                        SELECT * FROM user WHERE uid='$_SESSION[uid]'
                        "));   

?>       

<div class="main_content">
    <form id="order" action='rendeles_ir.php' method='post' target='kisablak'>
        <div>
            <legend>Szállítási adatok</legend>
                
            <label for="db">Darabszám</label><br/><br/>
            <input id="db" type="number" name="db" placeholder="6" required/> <br/><br/>
                
            <label for="fizetes">Fizetési mód:</label><br/><br/>
            <select id="fizetes" name="fizetes" size=”1”>
                <option value="Futárnak" selected>Fizetés a futárnak</option>
                <option value="Átutalás">Átutalás</option>
                <option value="Csak lopom">Simán csak lopom</option>
                <option value="Svájcon keresztül">Svájcon keresztül fogom elsumákolni</option>
                <option value="Orbán a barát">Orbán a barátom, bocsika</option>
                <option value="Levi csoró">Annyi pénzem sincs mint Levinek</option>
            </select><br/><br/>

            <input type='hidden'    name='uid'   value='<?=$user['uid'];?>'>
            <input type='hidden'    name='tid'   value='<?=$_GET['t'];?>'>

            <input type="submit" value="Rendelés"/>
        </div>
    </form>
</div>