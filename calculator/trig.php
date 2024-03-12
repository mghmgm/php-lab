<?php

function calculateTrig ($func, $arg) {
    switch ($func) {
        case 'sin' :
            return sin(deg2rad($arg));
            break;
        
        case 'cos' :
            return cos(deg2rad($arg));
            break;
        
        case 'tg' :
            return tan(deg2rad($arg));
            break;
        
        case 'ctg' :
            return 1/tan(deg2rad($arg));
            break;
        default:
            return 'Неизвестная функция';
            break;
    }
}

?>