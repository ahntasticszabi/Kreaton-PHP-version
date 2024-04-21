<?php
    session_start();

    include("adbkapcsolat.php");

    if($_POST['unev']=="")  die("<script> alert('You didn\'t give a username.')</script>");
    if($_POST['umail']=="")  die("<script> alert('You didn\'t give a email.')</script>");

    if(strlen($_POST['pw1'])<6)  die("<script> alert('Your password is to short. (Min. length is 6 character)')</script>");
    if($_POST['pw1']!=$_POST['pw2'])  die("<script> alert('The passwords are not the same.')</script>");

    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE uname = '$_POST[uname]'")))
    die("<script> alert('This username is already taken.')</script>");

    if(mysqli_num_rows(mysqli_query($adb, "SELECT * FROM user WHERE umail = '$_POST[umail]'")))
    die("<script> alert('There is already an account with this email address.')</script>");

    $upw    = md5($_POST['pw1']);
    $str10  = randomstring();
    mysqli_query($adb, "
            INSERT INTO user    (uid ,  unev,              umail,              uprofilkep,      upw,     udatum, ustatusz,   ujog,   uip,                      ustrid  ) 
            VALUES              (NULL,  '$_POST[unev]',    '$_POST[umail]',    'template.jpg',  '$upw',  NOW(),  'A',        'User', '$_SERVER[REMOTE_ADDR]',  '$str10');
    ");

    mysqli_close($adb);

    print "<script> 
                alert('Köszönjük a regisztrációdat!')
                parent.location.href='./?p=login'
            </script>
    ";
?>