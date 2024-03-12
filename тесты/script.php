<?php

    $input_string = 'a1b2c3';
    $result = preg_replace('/(\d)/', '$1$1', $input_string);
    echo $result;

?>