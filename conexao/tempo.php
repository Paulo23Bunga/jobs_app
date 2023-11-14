<?php
define('TIMEZONE', 'Africa/Luanda');
date_default_timezone_set(TIMEZONE);

function Ver_Tempo($date_time){
 //   $strTempoAntes = "";
  /*  if(!empty($_POST["date-field"])){
        $strTempoAntes = TempoAntes($_POST['date-field']);
    } */
//    function TempoAntes($date){
       $tempostime = strtotime($date_time);

       $iniciaTempo = array("segundo", "minuto", "hora", "dia", "mes", "ano");
       $valoresTempo = array("60", "60", "24", "30", "12", "10");

       $tempoCorrente = time();
       if ($tempoCorrente >= $tempostime) {
            $diff = time() - $tempostime;
            for($i = 0; $diff >= $valoresTempo[$i] && $i < count($valoresTempo) - 1; $i++){
                $diff = $diff / $valoresTempo[$i];
            }

            $diff = round($diff);
            if ($diff < 59 && $iniciaTempo[$i] == "segundo") {
                # code...
                return 'Ativa';
            }else{
                return $diff . "" . $iniciaTempo[$i] . "(s) antes";
            }
           // return $diff . "" . $iniciaTempo[$i] . "(s) antes";
       }
  //  }
}