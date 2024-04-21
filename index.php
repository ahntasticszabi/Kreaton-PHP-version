<?php
    session_start();
    date_default_timezone_set("Europe/Budapest");

    if(isset($_GET['p'])) $p = $_GET['p']; 
    else $p = "";
    //Ha az aktuális SESSION 'uid' változója nem üres, frissítse a változót aktívra 
    //Általános fact: A SESSION változó, azaz az aktuális session a bejelentkezéskor kapja meg az adatokat. Pl. uid, unev, stb.
    if(isset($_SESSION['uid'])) $belepve=1  ;
    else                        $belepve=0  ;

    include("adbkapcsolat.php");
    
    //Minden bejelentkezésnél, elkezdjük naplózni a felhasználó tevékenységét, a bejelentkezés ID-ja alapján amit szintén a SESSION-ből kapunk meg
    if($belepve) $lid=$_SESSION['lid']; else $lid=-1;
    mysqli_query($adb, "INSERT INTO naplo   (nid,   nurl,                       ndatum, nip,                        nlid)
                        VALUES              ('',    '$_SERVER[REQUEST_URI]',    NOW(),  '$_SERVER[REMOTE_ADDR]',    '$lid')
                        ");

    //Ha a felhasználó be van lépve, lekérjük az összes adatát az adatbázisból. Azt a sort ahol a SESSION-ben lévő UID egyezik a táblában lévővel
    if($belepve == 1)   $user = mysqli_fetch_array(mysqli_query($adb,   "
                        SELECT * FROM user WHERE uid='$_SESSION[uid]'
                        "));     
                        
    if($belepve == 1)   $admin = mysqli_fetch_array(mysqli_query($adb,   "
                        SELECT * FROM user WHERE ujog='$_SESSION[ujog]'
                        "));                    
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Kreaton</title>
</head>
<body>

<?php
    
    //Ha nincs belépve, nem jeleníti meg.
    if(!$belepve) print "";
    
    //Ha be van belépve, megjelenik.
    else {
    ?>
        <nav>
            <ul>
                <li class='dropdown'>
                    <a href='./?p=bolt' class='dropbtn'>Bolt</a>
                    <div class='dropdown-content'>
                        <a href='./?p=tren'>Tren</a>
                        <a href='./?p=feherje'>Fehérje</a>
                        <a href='./?p=vitamin'>Vitamin</a>
                    </div>
                </li>
                <li><a href='./?p=rolunk'>Rólunk</a></li>
                <li><a href='./?p=profil'>Profil</a></li>
                <?php
                    if($_SESSION['ujog']=='Admin') print "
                        <li><a href='./?p=admin'>Adminpanel</a></li>
                    ";
                ?>
            </ul>    
        </nav> 
        <?php
    }

    //Source-ok megadása
    //Ha az éppen aktív SESSION-ben az uid(UserID) változó üres  
    if(!isset($_SESSION['uid']))
    {
        //Ha a 'p' paraméter = 'reg', jelenítse meg a regisztrációs fület
        if($p=="reg")
            include ("reg_form.php");
        //Minden más esetben csak a bejelentkezést
        else 
            include("login_form.php");
    }
    //Ha a felhasználó be van lépve, engedélyezze a többi oldalt is
    else 
    {
        if($p=="fooldal"        )   include("rolunk.php")                                            ; else
        if($p=="bolt"           )   include("bolt.php")                                             ; else
        if($p=="kosar"          )   include("kosar.php")                                            ; else
        if($p=="rendeles"       )   include("rendeles.php")                                         ; else
        if($p=="profil"         )   include("profil.php")                                           ; else
        if($p=="tren"           )   include("tren.php")                                             ; else
        if($p=="feherje"        )   include("feherje.php")                                          ; else
        if($p=="vitamin"        )   include("vitamin.php")                                          ; else
        if($p=="admin"          )   include("admin.php")                                            ; else
        if($p=="adatvalt"       )   include("adatszerk_form.php")                                   ; else
        //if($p=="pwchange"       )   include("pwchange_form.php")                                    ; else
        //if($p=="profpicchange"  )   include("profpicchange_form.php")                               ; else
        
        include("rolunk.php");
    }
    ?>

    <footer>
        <h1>Authors: Titán és Levente</h1>
    </footer>

    <iframe name='kisablak' style="display:none;" x_width=640 y_height=480 z_frameborder=0></iframe>

</body>
</html>