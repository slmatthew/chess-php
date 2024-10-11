<?

include_once './figures/Bishop.php';
include_once './figures/Horse.php';
include_once './figures/King.php';
include_once './figures/Queen.php';
include_once './figures/Rook.php';

include_once './visual/Visible.php';

echo "1, с - слон\n2, к - конь\n3, кр - король\n4, ф - ферзь\n5, л - ладья\n" . PHP_EOL;

$first = match(readline("Введите первую фигуру: ")) {
    '1', 'с'    => 'Bishop',
    '2', 'к'    => 'Horse',
    '3', 'кр'   => 'King',
    '4', 'ф'    => 'Queen',
    '5', 'л'    => 'Rook',
    default     => null
};

$second = match(readline("Введите вторую фигуру: ")) {
    '1', 'с'    => 'Bishop',
    '2', 'к'    => 'Horse',
    '3', 'кр'   => 'King',
    '4', 'ф'    => 'Queen',
    '5', 'л'    => 'Rook',
    default     => null
};

if($first == null || $second == null) exit('Неверно введены фигуры'.PHP_EOL);

try {
    echo "X - коорднината по вертикали, Y - по горизонтали\n" . PHP_EOL;
    $a = (int)readline('Введите X для первой фигуры (a): ');
    $b = (int)readline('Введите Y для первой фигуры (b): ');
    $c = (int)readline('Введите X для второй фигуры (c): ');
    $d = (int)readline('Введите Y для второй фигуры (d): ');
    $e = (int)readline('Введите X проверяемого поля (e): ');
    $f = (int)readline('Введите Y проверяемого поля (f): ');

    $first = new $first($a, $b);
    $second = new $second($c, $d);

    if(!$first->canGoOn($e, $f)) {
        echo "[{$first->name}-{$second->name}] Ошибка: {$first->name} никак не сможет пойти на поле {$e},{$f}" . PHP_EOL;
    } elseif($e == $c && $f == $d && $first->canGoOn($e, $f)) {
        echo "[{$first->name}-{$second->name}] Да, {$first->name} может пойти на поле {$e},{$f} и съесть {$second->name}" . PHP_EOL;
    } elseif($first->canGoOn($e, $f) && $second->canGoOn($e, $f)) {
        echo "[{$first->name}-{$second->name}] Нет, {$first->name} не может пойти на поле {$e},{$f}" . PHP_EOL;
    } else {
        echo "[{$first->name}-{$second->name}] Да, {$first->name} может пойти на поле {$e},{$f}" . PHP_EOL;
    }

    echo 'Визуализация в файле ' . Visible::generateHTML($first, $second) . PHP_EOL;
} catch(Exception $e) {
    echo "Неверные данные!" . PHP_EOL;
}