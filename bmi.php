<?php
        $mass = $_POST['mass'];
        $height = $_POST['height'];

        function bmi($mass,$height) {
            $bmi = $mass/($height*$height);
            return $bmi;
        }   

        $bmi = bmi($mass,$height); //<--- this is critical

        if ($bmi <= 18.5) {
            $output = "alultáplált";

            } else if ($bmi > 18.5 AND $bmi<=24.9 ) {
            $output = "normál súlyú";

            } else if ($bmi > 24.9 AND $bmi<=29.9) {
            $output = "túlsúlyos";

            } else if ($bmi > 30.0) {
            $output = "elhízott";
        }
        print "<script> 
            alert('A BMI értéked: $bmi. Te $output vagy')
            parent.location.href='./?p=profil'
        </script>";
?>