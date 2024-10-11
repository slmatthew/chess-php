<?

// слон

include_once 'Figure.php';

class Bishop extends Figure {
    public function __construct(int $startX, int $startY) {
        parent::__construct("Слон", $startX, $startY);
    }

    public function canGoOn(int $x, int $y): bool {
        if(!$this->checkLimits($x, $y)) return false;
        $this->wantsToX = $x;
        $this->wantsToY = $y;

        $absDiffX = abs($x - $this->startX);
        $absDiffY = abs($y - $this->startY);

        $this->canGo = ($absDiffX == $absDiffY);
        return $this->canGo;
    }
}