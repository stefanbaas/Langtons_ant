<?php
namespace App\Classes;

Class Canvas
{
    private $width;
    private $height;
    private $playfield;

    /**
     * Canvas constructor.
     * @param $width
     * @param $height
     */
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the current dimensions of the canvas
     * @return array
     */
    public function getDimensions(): ?array
    {
        if($this->width && $this->height) {
            return array($this->width, $this->height);
        }
        return null;
    }

    /**
     * Create a playfield based on the dimensions
     * @return array
     */
    public function createPlayfield(): array
    {
        for($y = 0; $y < $this->height; $y++){
            for($x = 0; $x < $this->width; $x++) {
                $this->playfield[$y][$x] = 0;
            }
        }
        return $this->playfield;
    }

    /**
     * Create a random startingPoint and return it
     * @return array
     */
    public function createRandomStartingPoint(): ?array
    {
        // Check if playfield isset
        if(!$this->playfield) {
            return null;
        }

        // Create random startingPoint array
        $y = array_rand($this->playfield);
        $x = array_rand($this->playfield[$y]);
        $startingPoint = array('x' => $x, 'y' => $y);

        return $startingPoint;
    }
}