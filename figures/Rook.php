<?

// ладья

include_once 'Figure.php';

class Rook extends Figure {
    public function __construct(int $startX, int $startY) {
        parent::__construct("Ладья", $startX, $startY);
    }

    public function canGoOn(int $x, int $y): bool {
        if(!$this->checkLimits($x, $y)) return false;
        $this->wantsToX = $x;
        $this->wantsToY = $y;

        $diffX = $x - $this->startX;
        $diffY = $y - $this->startY;

        $this->canGo = ($diffX == 0 && $diffY != 0) || ($diffX != 0 && $diffY == 0);
        return $this->canGo;
    }
}