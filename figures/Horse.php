<?

// конь

include_once 'Figure.php';

class Horse extends Figure {
    public function __construct(int $startX, int $startY) {
        parent::__construct("Конь", $startX, $startY);
    }

    public function canGoOn(int $x, int $y): bool {
        if(!$this->checkLimits($x, $y)) return false;
        $this->wantsToX = $x;
        $this->wantsToY = $y;

        $absDiffX = abs($x - $this->startX);
        $absDiffY = abs($y - $this->startY);

        $this->canGo = ($absDiffX == 2 && $absDiffY == 1) || ($absDiffX == 1 && $absDiffY == 2);
        return $this->canGo;
    }
}