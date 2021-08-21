<?php

function sendErrorEmail($sub,$msg,$to = 'suneel.indukuru@bradsol.com'){
    $mailSent = false;
    try {
        $mailSent = mail($to,$sub,$msg);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $mailSent;
}

function cleanString($pstr){
    try {
        $rstr= htmlspecialchars(strip_tags(trim(addslashes($pstr))));
    } catch (Exception $e) {
        echo "Error in cleanString".$e->getMessage();
    }
    return $rstr;
}

?>