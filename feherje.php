<?php
$feherje = mysqli_query( $adb , "
    SELECT * 
    FROM   termekek
    WHERE ttipus = 'Fehérje'
    ORDER BY tnev
");
?>

<div class="main_content">
    <div class="shop_content">
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
    </div>
</div>