<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $equation = 'x / 8 = 6';
        $elem = explode (" ", $equation);
        $left_expression = $elem[0];
        $right_expression = $elem[2];
        $result = $elem[4];
        switch ($elem[1]) {
            case "+":
                $x = $result - $right_expression;
                break;
            case "-":
                $x = $result + $right_expression;
                break;
            case "*":
                $x = $result / $right_expression;
                break;
            case "/":
                $x = $result * $right_expression;
                break;
            case "**":
                $x = log($res, $right_expression);
                break;
            default:
                echo "Неподдерживаемый оператор";
        }
        echo $x;
    ?>
</body>
</html>