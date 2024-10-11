<?

abstract class Figure {
    public bool $canGo = false;

    public function __construct(
        public string $name,
        public int $startX, public int $startY,
        public ?int $wantsToX = null, public ?int $wantsToY = null) {
        $this->checkLimits($startX, $startY);
    }

    protected function checkLimits(int $x, int $y): bool {
        if($x > 8 || $y > 8 || $x < 1 || $y < 1) {
            throw new Exception("invalid data");
        }

        return true;
    }

    abstract public function canGoOn(int $x, int $y): bool;
}