<?php
$tren = mysqli_query( $adb , "
      SELECT * 
      FROM   termekek
      WHERE ttipus = 'Tren'
      ORDER BY tnev
");

$feherje = mysqli_query( $adb , "
    SELECT * 
    FROM   termekek
    WHERE ttipus = 'Fehérje'
    ORDER BY tnev
");

$vitamin = mysqli_query( $adb , "
    SELECT * 
    FROM   termekek
    WHERE ttipus = 'Vitamin'
    ORDER BY tnev
");
?>

<div class="main_content">
    <div class="shop_content">
        <div id="tren" class="shop_container">
            <h1>Tren</h1>
            <div class="shop_items">
                <?php 
                    while ($trenek = mysqli_fetch_assoc($tren)) {  
                    print "
                        <div class='item'>
                            <div>
                                <h3>$trenek[tnev]</h3>
                                <img src='INDEXKEP/$trenek[tkep]' alt='$trenek[tnev]'>
                            </div>
                            <div>
                                <a href='./?p=rendeles&t=$trenek[tid]' target='_self'>Vásárlás</a>
                                <p>$trenek[tleiras]</p>";
                                if ($trenek['tstatusz'] == "Van raktáron") {
                                    echo "<h4>$trenek[tar] ft</h4>";
                                }
                                else echo "<h4 style='color:red;'>A termék nincs raktáron!</h4>";
                            print "
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </div>
        <div id="feherje" class="shop_container">
            <h1>Feherje</h1>
            <div class="shop_items">
                <?php 
                    while ($feherjek = mysqli_fetch_assoc($feherje)) {  
                    print "
                        <div class='item'>
                            <div>
                                <h3>$feherjek[tnev]</h3>
                                <img src='INDEXKEP/$feherjek[tkep]' alt='$feherjek[tnev]'>
                            </div>
                            <div>
                                <a href='./?p=rendeles&t=$feherjek[tid]' target='_self'>Vásárlás</a>
                                <p>$feherjek[tleiras]</p>";
                                if ($feherjek['tstatusz'] == "Van raktáron") {
                                    echo "<h4>$feherjek[tar] ft</h4>";
                                }
                                else echo "<h4 style='color:red;'>A termék nincs raktáron!</h4>";
                            print "
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </div>
        <div id="vitamin" class="shop_container">
            <h1>Vitamin</h1>
            <div class="shop_items">
                <?php 
                    while ($vitaminok = mysqli_fetch_assoc($vitamin)) {  
                    print "
                        <div class='item'>
                            <div>
                                <h3>$vitaminok[tnev]</h3>
                                <img src='INDEXKEP/$vitaminok[tkep]' alt='$vitaminok[tnev]'>
                            </div>
                            <div>
                                <a href='./?p=rendeles&t=$vitaminok[tid]' target='_self'>Vásárlás</a>
                                <p>$vitaminok[tleiras]</p>";
                                if ($vitaminok['tstatusz'] == "Van raktáron") {
                                    echo "<h4>$vitaminok[tar] ft</h4>";
                                }
                                else echo "<h4 style='color:red;'>A termék nincs raktáron!</h4>";
                            print "
                            </div>
                        </div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>