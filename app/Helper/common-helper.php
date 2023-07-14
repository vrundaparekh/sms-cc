<?php
function Grade($per = 0){
    $per = round($per);
    if($per< 100 && $per > 90){
        return $grade = "A";
    }
    elseif($per<90 && $per >75){
        return $grade ="B";
    }
    elseif($per<75 && $per >65){
        return $grade ="C";
    }
    elseif($per <65 && $per>60){
        return $grade ="D";
    }
    elseif($per<60 && $per>50){
        return $grade="E";
    }
    else{
        return $grade = "F";
    }
}
?>