<?

include_once './figures/Figure.php';

class Visible {
    public const tableSize = 8;

    static function generateHTML(Figure $first, Figure $second): string {
        $head = file_get_contents(__DIR__ . '/head.html');
        $footer = file_get_contents(__DIR__ . '/footer.html');

        $body = '';

        for($row = 0; $row < self::tableSize; $row++) {
            $body .= "<tr>";
            for ($col = 0; $col < self::tableSize; $col++) {
                // Определяем, должна ли клетка быть черной или белой
                $class = ($row + $col) % 2 == 0 ? 'white' : 'black';
                
                if($first->wantsToX - 1 == $row && $first->wantsToY - 1 == $col) $class .= ' firstWants';
                if($second->wantsToX - 1 == $row && $second->wantsToY - 1 == $col && $second->canGo) $class .= ' secondWants';

                $tdBody = '';

                if($first->startX - 1 == $row && $first->startY - 1 == $col) {
                    $tdBody = $first->name;
                    $class .= ' first';
                }
                if($second->startX - 1 == $row && $second->startY - 1 == $col) {
                    $tdBody = $second->name;
                    $class .= ' second';
                }

                $body .= "<td class='$class'>$tdBody</td>";
            }
            $body .= "</tr>";
        }

        $html = $head . $body . $footer;
        $fileName = __DIR__ . "/html/{$first->name}{$second->name}.html";

        file_put_contents($fileName, $html);

        return $fileName;
    }
}