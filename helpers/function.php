<?php 


        //?Random function 
        function makeRandomString($valueLenght)
        {
            $aph = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
            $FinalString = "";
            for ($i=0; $i <= $valueLenght ; $i++) { 
                $FinalString .= $aph[mt_rand(0,strlen($aph) -1)];
            
            }
            return $FinalString;
        }


        

?>