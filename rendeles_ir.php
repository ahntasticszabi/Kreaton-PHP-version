<?php
    session_start();

    include("adbkapcsolat.php");

    if($_POST['db'] == "")  
    die("<script> alert('Nem adtál meg darabszámot.')</script>");

    mysqli_query($adb, "
            INSERT INTO rendeles    (rid,    rtid,          ruid,          rdb,            rfizetes,           rdatum, rip                     )
            VALUES                  ('',     '$_POST[tid]', '$_POST[uid]', '$_POST[db]',   '$_POST[fizetes]',  NOW(),  '$_SERVER[REMOTE_ADDR]' );
    ");

    mysqli_close($adb);

    print "<script> 
                alert('Köszönjük rendelésed!')
                parent.location.href=parent.location.href
            </script>
    ";
?>