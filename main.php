<?

include_once './figures/Bishop.php';
include_once './figures/Horse.php';
include_once './figures/King.php';
include_once './figures/Queen.php';
include_once './figures/Rook.php';

include_once './visual/Visible.php';

try {
    $a = (int)readline('Введите число a: ');
    $b = (int)readline('Введите число b: ');
    $c = (int)readline('Введите число c: ');
    $d = (int)readline('Введите число d: ');
    $e = (int)readline('Введите число e: ');
    $f = (int)readline('Введите число f: ');

    function repeat($first, $second) {
        global $a, $b, $c, $d, $e, $f;

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
    
        Visible::generateHTML($first, $second);
    }

    // ладья и ладья
    repeat(Rook::class, Rook::class);

    // ладья и ферзь
    repeat(Rook::class, Queen::class);

    // ладья и конь
    repeat(Rook::class, Horse::class);

    // ладья и слон
    repeat(Rook::class, Bishop::class);

    // ферзь и ферзь
    repeat(Queen::class, Queen::class);

    // ферзь и ладья
    repeat(Queen::class, Rook::class);

    // ферзь и конь
    repeat(Queen::class, Horse::class);

    // ферзь и слон
    repeat(Queen::class, Bishop::class);

    // конь и конь
    repeat(Horse::class, Horse::class);

    // конь и ладья
    repeat(Horse::class, Rook::class);

    // конь и ферзь
    repeat(Horse::class, Queen::class);

    // конь и слон
    repeat(Horse::class, Bishop::class);

    // слон и слон
    repeat(Bishop::class, Bishop::class);

    // слон и ферзь
    repeat(Bishop::class, Queen::class);

    // слон и конь
    repeat(Bishop::class, Horse::class);

    // слон и ладья
    repeat(Bishop::class, Rook::class);

    // король и слон
    repeat(King::class, Bishop::class);

    // король и ферзь
    repeat(King::class, Queen::class);

    // король и конь
    repeat(King::class, Horse::class);

    // король и ладья
    repeat(King::class, Rook::class);
} catch(Exception $e) {
    echo "Неверные данные!" . PHP_EOL;
}
