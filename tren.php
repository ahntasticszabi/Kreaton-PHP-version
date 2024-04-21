<?php
$tren = mysqli_query( $adb , "
      SELECT * 
      FROM   termekek
      WHERE ttipus = 'Tren'
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
    </div>
</div>