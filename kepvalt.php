<?php
    session_start();

    $uprofilkep = $_FILES['pp'];

    include("adbkapcsolat.php");
    include("func_sizing.php");

    $picname = date("YmdHis_") . "_" . randomstring(10) . substr($uprofilkep['name'], strrpos($uprofilkep['name'], "."));
    move_uploaded_file($uprofilkep['tmp_name'] , "./PROFILKEPEK/" . $picname);

    $t = strtolower(substr( $picname , -4 ));

    $str10  = randomstring();

    if( $t==".jpg" || $t=="jpeg" || $t==".gif" || $t==".png" || $t=="webp")
	{
        $t = mysqli_query($adb, "
            UPDATE  user
            SET     uprofilkep  =  '$picname'
            WHERE   ustrid      =   '$_POST[ustrid]'
        ");

        print "
        <script>
            alert('A profilképed meglett változtatva')
            parent.location.href='./?p=profil'
        </script>
        ";
    }
    else print "<script> alert('Ez a formátum nem engedélyezett')</script>";

    mysqli_close($adb);
?>