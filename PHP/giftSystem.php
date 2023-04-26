<?php
    //ritorna il numero di ore prima del prossimo regalo (con 24, 23 22 bisogna verificare se riscattato oggi o no!)
    function giftAvailable(){
        date_default_timezone_set('Europe/Rome');
        $d = localTime(null, true);
        $h = $d['tm_hour'];
        if($h<15) $h = 15 - $h;
        else $h = 15 + 24 - $h;
        return $h;
    }
?>