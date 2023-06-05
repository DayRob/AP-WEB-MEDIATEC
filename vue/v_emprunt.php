<?php

foreach($lesEmprunts as $unEnprunts){
    
    echo $unEnprunts->getDocument()->getTitre();
    
}
?>