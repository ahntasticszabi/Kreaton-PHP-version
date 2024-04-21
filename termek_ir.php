<?php
    session_start();

    $tkep = $_FILES['tkep'];
    if($tkep['name']=="")   die("<script> alert('Nem választottál képet.')</script>");

    include("adbkapcsolat.php");
    include("func_sizing.php");

    $picname = date("YmdHis_") . $_POST['tid'] . "_" . randomstring(10) . substr($tkep['name'], strrpos($tkep['name'], "."));
    move_uploaded_file($tkep['tmp_name'] , "./TERMEKKEPEK/" . $picname);

    $t = strtolower(substr( $picname , -4 ));

    resize_crop_image(700, 700, "./TERMEKKEPEK/".$picname , "./INDEXKEP/".$picname);

    if( $t==".jpg" || $t=="jpeg" || $t==".gif" || $t==".png" || $t=="webp")
	  {
        $t = mysqli_query($adb, "
            INSERT INTO termekek    (tid,   ttipus,             tnev,           tleiras,            tkep,           tar,              tstatusz          )
            VALUES                  ('',    '$_POST[ttipus]',   '$_POST[tnev]', '$_POST[tleiras]',  '$picname',     '$_POST[tar]',    'Van raktáron'    );
        ");
        
        print "
        <script>
            alert('A termék feltöltésre került.')
            parent.location.href='./?p=admin'
        </script>
        ";
    }
    else print "<script> 
                    alert('A termék nem tölthető fel.')
                    parent.location.href='./?p=admin'
                </script>";

    mysqli_close($adb);
?>