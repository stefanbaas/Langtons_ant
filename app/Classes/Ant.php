<?php
namespace App\Classes;

Class Ant
{
    var $width;
    var $height;
    var $x;
    var $y;
    var $startPosition = ['x' => 0,'y' => 0];
    var $stepCount = 0;
    var $possibleDirections = ['up','down','left','right'];
    var $currentDirection = 'right';
    var $field = [];

    public function __construct(int $width, int $height, int $x, int $y)
    {
        $this->width = $width;
        $this->height = $height;
        $this->startPosition = ['x' => $x, 'y' => $y];
        $this->currentDirection = $this->possibleDirections[array_rand($this->possibleDirections)];
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Move up
     * @return array
     */
    public function moveUp()
    {
        $this->y--;
        $this->currentDirection = 'up';
        return ['x' => $this->x, 'y' => $this->y];
    }

    /**
     * Move down
     * @return array
     */
    public function moveDown()
    {
        $this->y++;
        $this->currentDirection = 'down';
        return ['x' => $this->x, 'y' => $this->y];
    }

    /**
     * Move left
     * @return array
     */
    public function moveLeft()
    {
        $this->x--;
        $this->currentDirection = 'left';
        return ['x' => $this->x, 'y' => $this->y];
    }

    /**
     * Move right
     * @return array
     */
    public function moveRight()
    {
        $this->x++;
        $this->currentDirection = 'right';
        return ['x' => $this->x, 'y' => $this->y];
    }

    /**
     * Get the direction after up
     * @param $active
     * @return mixed|string
     */
    public function directionAfterUp($active)
    {
        if($active){
            $this->moveLeft();
        }else{
            $this->moveRight();
        }

        return $this->currentDirection;
    }

    /**
     * Get the direction after down
     * @param $active
     * @return mixed|string
     */
    public function directionAfterDown($active)
    {
        if($active){
            $this->moveRight();
        }else{
            $this->moveLeft();
        }

        return $this->currentDirection;
    }

    /**
     * Get the direction after left
     * @param $active
     * @return mixed|string
     */
    public function directionAfterLeft($active)
    {
        if($active){
            $this->moveDown();
        }else{
            $this->moveUp();
        }

        return $this->currentDirection;
    }

    /**
     * Get the direction after right
     * @param $active
     * @return mixed|string
     */
    public function directionAfterRight($active)
    {
        if($active){
            $this->moveUp();
        }else{
            $this->moveDown();
        }

        return $this->currentDirection;
    }

    public function isActive(int $x, int $y)
    {
        return isset($this->field[$y][$x]);
    }

    public function setActive(int $x, int $y)
    {
        $this->field[$y][$x] = 1;

        return true;
    }

    public function removeActive(int $x, int $y)
    {
        if(isset($this->field[$y][$x])){
            unset($this->field[$y][$x]);

            return true;
        }
        return false;
    }

    /**
     * Get a new direction
     * When the key exist the ant is moving in a different direction
     * @return mixed|string
     */
    public function moveAnt()
    {
        $this->stepCount++;
        $active = $this->isActive($this->x, $this->y);
        if($active){
            $this->removeActive($this->x, $this->y);
        }else{
            $this->setActive($this->x, $this->y);
        }

        switch ($this->currentDirection) {
            case 'up':
                $this->directionAfterUp($active);
                break;
            case 'down':
                $this->directionAfterDown($active);
                break;
            case 'left':
                $this->directionAfterLeft($active);
                break;
            case 'right':
                $this->directionAfterRight($active);
                break;
        }

        return $this->currentDirection;
    }

    /**
     * Check if ant is inside canvas
     * @param int $x
     * @param int $y
     * @return bool
     */
    public function isInsideCanvas(int $x, int $y)
    {
        return (0 <= $x && $x <= $this->width && 0 <= $y && $y <= $this->height);
    }

    /**
     * Move ant
     * @return array
     */
    public function move()
    {
        // Keep ant inside canvas
        while($this->isInsideCanvas($this->x, $this->y))
        {
            $this->moveAnt();
        }

        return $this->field;
    }
}