<?php
    session_start();

    include("adbkapcsolat.php");

    if($_POST['user']=="")  die("<script> alert('Nem adtad meg a felhasználóneved')</script>");
    if($_POST['pw']=="")    die("<script> alert('Nem adtad meg a jelszavad')</script>");

    $upw = md5($_POST['pw']);
    
    $t = mysqli_query($adb, "
            SELECT  * FROM user
            WHERE   (unev='$_POST[user]' OR umail='$_POST[user]') 
            AND     upw = '$upw'
            AND     ustatusz = 'A'
    ");

    if(mysqli_num_rows($t))
    {
        $sor = mysqli_fetch_array($t);

        $_SESSION['uid']    =   $sor['uid'];
        $_SESSION['unev']   =   $sor['unev'];
        $_SESSION['umail']  =   $sor['umail'];
        $_SESSION['upw']    =   $sor['upw'];
        $_SESSION['ujog']   =   $sor['ujog'];

        mysqli_query($adb, "
            INSERT INTO login   (lid,   luid,           ldatum, lip                     ) 
            VALUES              ('',    '$sor[uid]',    NOW(),  '$_SERVER[REMOTE_ADDR]' );
        ");
        $_SESSION['lid']    =   mysqli_insert_id($adb);

        print "
            <script>
                parent.location.href='./?p=fooldal'
            </script>
        ";
    }
    else 
    {
        die("<script> 
                    alert('Az email vagy jelszó nincs használatban profilnál.')
                    parent.location.href='./?p=login'
            </script>");
    }

    mysqli_close($adb);
?>