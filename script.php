<?php

    $string1 = 'aaab aaagg';
    $new_string1 = preg_replace('#a{3}(?!b)#','!', $string1);
    echo $new_string1;

    $string2 = 'aaa bcd xxx efg';
    preg_match_all('#\b(\w)\1+\b#', $string2, $matches1);

    foreach ($matches1[0] as $match) {
        echo $match . "\n";
    }
    
    $string3 = 'aa aba abba abbba abca abea';
    preg_match_all('#\ba[b]+a\b#', $string3, $matches2);

    foreach ($matches2[0] as $match) {
        echo $match . "\n";
    }

    $string4 = 'a1a a2a a3a a4a a5a aba aca';
    preg_match_all('#\ba\d{1}a\b#', $string4, $matches3);

    foreach ($matches3[0] as $match) {
        echo $match . "\n";
    }

?>