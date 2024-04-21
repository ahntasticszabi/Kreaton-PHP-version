

<div class="main_content">
    <div class="admin-box">
        <form class="admin-form" action='termek_ir.php' method='post' target="kisablak" enctype='multipart/form-data'>
            <div>
                <legend>Termék hozzáadása</legend>
                <label for="ttipus">Termék típusa:</label> <br>
                <input id="tipus" type="text" name="ttipus" placeholder="tren, fehérje, vitamin" required/>
                <br/><br/>
                <label for="tnev">Termék neve:</label> <br>
                <input id="term" type="text" name="tnev" placeholder="Trenatilos fogkrém..." required/> <br/><br/>
                <label for="tleiras">Leírás:</label> <br/>
                <textarea id="leir" type="text" name="tleiras" placeholder="nagyon finom nagyon jo..."></textarea><br/><br/>
                <label for="tar">Termék ára:</label> <br/>
                <input id="ar" type="text" name="tar" placeholder="69696969ezermégezer ft" required/> <br/><br/>
                <label for="tkep">Termék képe:</label> <br/>
                <input id="kep" type="file" name="tkep" required/> <br/><br/>
                <input type="submit" value="Feltöltés"/>
            </div>
        </form>
    </div>


    <div class="admin-box">
        <h1>Admin Felület</h1>
    </div>


    <div class="admin-box">
        <form class="admin-form" method="post">
            <div>
                <legend>Termék Törlése</legend>
                <label for="neve">Termék neve:</label><br>
                <input id="neve" type="text" name="tnev" placeholder="Trenatilos fogkrém..." required/> <br/><br/>
                <label for="azon">Termék azonositója:</label> <br/>
                <input id="azon" type="text" name="tid" placeholder="2" required/> <br/><br/>
                <input type="submit" name="tfrissites" value="Frissítés"/>
            </div>
        </form>
    </div>
</div>

<?php

if(isset($_REQUEST['tfrissites'])){
      if(mysqli_query($adb, "
      UPDATE termekek SET tstatusz = 'Nincs raktáron' WHERE tid = '$_REQUEST[tid]'
      ")){
            print "<script>
                  alert('A termék státusza frissítve lett')
                  parent.location.href=parent.location.href
            </script>";
      }
      else print "<script> alert('A termék státuszát nem sikerült frissíteni')</script>"; 
}

?>