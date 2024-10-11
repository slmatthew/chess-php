<?

// король

include_once 'Figure.php';

class King extends Figure {
    public function __construct(int $startX, int $startY) {
        parent::__construct("Король", $startX, $startY);
    }

    public function canGoOn(int $x, int $y): bool {
        if(!$this->checkLimits($x, $y)) return false;
        $this->wantsToX = $x;
        $this->wantsToY = $y;

        $absDiffX = abs($x - $this->startX);
        $absDiffY = abs($y - $this->startY);

        $this->canGo = ($absDiffX == 1 && $absDiffY == 1) ||
                       ($absDiffX == 1 && $absDiffY == 0) ||
                       ($absDiffX == 0 && $absDiffY == 1);
        return $this->canGo;
    }
}