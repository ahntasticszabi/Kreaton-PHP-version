<?php
$vitamin = mysqli_query( $adb , "
    SELECT * 
    FROM   termekek
    WHERE ttipus = 'Vitamin'
    ORDER BY tnev
");
?>

<div class="main_content">
    <div class="shop_content">
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