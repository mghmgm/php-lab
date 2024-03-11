<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        button {
            padding: 16px;
            font-size: 18px;
            width: 60px;
            background-color: #a389b8;
            border-radius: 10px;
            border: 1px black solid;
        }
        button:hover {
            background-color: #52a87c;
        }
        .calculator {
            margin-inline: auto;
            margin-top: 10px;
            display: flex;
            width: 380px;
            flex-direction: column;
            border: 1px black solid;
            padding:30px;
            border-radius: 10px;
        }
        .calculator__result {
            font-size: 20px;
        }
        .calculator__btns {
            display: flex;
            gap:18px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .calculator__equation {
            font-size: 16px;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid black;
            width: 350px;
        }
        .calculator__btn--operator {
            background-color: #52a87c;
        }
        .calculator__btn--operator:hover {
            background-color: #a389b8;
        }
        .calculator__btn--last {
            margin-left: 156px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>Домашняя работа: Calculator</h1>
    <form method="post" class="calculator">
        <label>
            <input type="text"  value="" name="equation" class="calculator__equation">
        </label>
        <p class="calculator__result"> =
            <?php 
                $value='';

                // проверка на число

                function isNumber ($item) {
                    if (is_numeric($item)){
                        return true;
                    }
                    return false;
                }

                // вычисление примера
                
                function calculate ($value) {
                    
                    if (isNumber($value)) {
                        return $value;
                    }
                    

                    // сложение

                    $equation = explode("+", $value);

                    if (count($equation)>1) {

                        $sum = 0;

                        foreach ($equation as $elem) {
                            if (!isNumber($elem)) {
                                $elem = calculate($elem);  
                            } 
                            $sum += (int)$elem;
                        }

                        return $sum;
                    }

                    // вычитание
                    
                    $equation = explode("-", $value);

                    if (count($equation)>1) {
                        if (!isNumber($equation[0])) {
                            $equation[0] = calculate($equation[0]);
                        }

                        $diff = $equation[0];

                        for ($i=1; $i<count($equation); $i++) {
                            if (!isNumber($equation[$i])) {
                                $equation[$i] = calculate($equation[$i]); 
                            } 
                            $diff -= (int)$equation[$i];
                        }

                        return $diff;
                    }

                    // умножение

                    $equation = explode("*", $value);

                    if (count($equation)>1) {

                        $multi = 1;

                        foreach ($equation as $elem) {
                            if (!isNumber($elem)) {
                                $elem = calculate($elem); 
                            } 
                            $multi *= (int)$elem;
                        }

                        return $multi;
                    }

                    // деление

                    $equation = explode("/", $value);

                    if (count($equation)>1) {
                        if (!isNumber($equation[0])) {
                            $equation[0] = calculate($equation[0]);
                        }

                        $div = $equation[0];

                        for ($i=1; $i<count($equation); $i++) {
                            if (!isNumber($equation[$i])) {
                                $equation[$i] = calculate($equation[$i]); 
                            } 
                            if ($equation[$i]==0) {
                                return 'На ноль делить нельзя';
                            } else {
                                $div /= (int)$equation[$i];
                            }
                        }

                        return $div;
                    }
                    
                    return 'Символы не распознаны';
                }
                

                // вычисление тригонометрии

                function calculateTrig ($func, $value) {
                    switch ($func) {
                        case 'sin' :
                            return sin(deg2rad($value));
                            break;
                        
                        case 'cos' :
                            return cos(deg2rad($value));
                            break;
                        
                        case 'tg' :
                            return tan(deg2rad($value));
                            break;
                        
                        case 'ctg' :
                            return 1/tan(deg2rad($value));
                            break;

                        default:
                            return 'Неизвестная функция';
                            break;
                    }
                }

                // проверка на расстановку скобок

                function bracketsValidator($value) {

                    $open = 0;

                    for ($i = 0; $i < strlen($value); $i++) {
                        if ($value[$i] == '(') $open++;
                        else {
                            if ($value[$i] == ')') {
                                $open--;
                                if ($open < 0) return false;
                            }
                        }
                    }

                    if ($open !== 0) return false;
                    return true;
                }

                // вычисление примера со скобками

                function calculateWithBrackets($value) {
                    if ($value=='') {
                        return '';
                    }

                    if (preg_match('/(sin|cos|tg|ctg)\([\d.]+\)/', $value)) {
                        $value = preg_replace_callback('/(sin|cos|tg|ctg)\(([\d.]+)\)/', function($matches) {
                            $func = $matches[1];
                            $arg = floatval($matches[2]);
                            return calculateTrig($func, $arg);
                        }, $value);
                    }

                    if (strpos($value, '(') !== false) {
                        $start = strpos($value, '(');
                        $end = $start + 1;
                        $open = 1;
                        
                        while ($open && $end < strlen($value)) {
                            if ($value[$end] == '(') $open++;
                            if ($value[$end] == ')') $open--;
                            $end++;
                        }

                        $new_value = substr($value, 0, $start);
                        $new_value .= calculateWithBrackets(substr($value, $start + 1, $end - $start - 2));
                        $new_value .= substr($value, $end);

                        return calculateWithBrackets($new_value);
                    }
                    return calculate($value);
                }

                // сбор данных методом POST и вывод
                
                if (isset($_POST['equation'])) {
                    $result = calculateWithBrackets($_POST['equation']);
                    echo $result;
                };               
            ?>
        </p>
        <div class="calculator__btns">
            <button class="calculator__btn calculator__btn--operator">sin</button>
            <button class="calculator__btn calculator__btn--operator">(</button>
            <button class="calculator__btn calculator__btn--operator">)</button>
            <button type="reset" class="calculator__reseter calculator__btn--operator">C</button>
            <button class="calculator__btn calculator__btn--operator">/</button>
            <button class="calculator__btn calculator__btn--operator">cos</button>
            <button class="calculator__btn">7</button>
            <button class="calculator__btn">8</button>
            <button class="calculator__btn">9</button>
            <button class="calculator__btn calculator__btn--operator">*</button>
            <button class="calculator__btn calculator__btn--operator">tg</button>
            <button class="calculator__btn">4</button>
            <button class="calculator__btn">5</button>
            <button class="calculator__btn">6</button>
            <button class="calculator__btn calculator__btn--operator">-</button>
            <button class="calculator__btn calculator__btn--operator">ctg</button>
            <button class="calculator__btn">1</button>
            <button class="calculator__btn">2</button>
            <button class="calculator__btn">3</button>
            <button class="calculator__btn calculator__btn--operator">+</button>
            <button class="calculator__btn calculator__btn--last">0</button>
            <button class="calculator__btn">.</button>
            <button type="submit" class="calculator__eval calculator__btn--operator">=</button>
        </ul>
    </form>
    <script src="front.js"></script>
    
</body>
</html>