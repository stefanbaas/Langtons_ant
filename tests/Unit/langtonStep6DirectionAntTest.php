<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Classes\Ant;

class langtonStep6DirectionAntTest extends TestCase
{
    private $ant;

    public function setUp()
    {
        $this->ant = new Ant(6,6,3,3);
    }

    /**
     * Test if the right directions are returned
     */
    public function testDirectionAnt()
    {
        // Test if the new direction matches
        $this->assertEquals('right', $this->ant->directionAfterUp(false));
        $this->assertEquals('left', $this->ant->directionAfterUp(true));
        $this->assertEquals('left', $this->ant->directionAfterDown(false));
        $this->assertEquals('right', $this->ant->directionAfterDown(true));
        $this->assertEquals('up', $this->ant->directionAfterLeft(false));
        $this->assertEquals('down', $this->ant->directionAfterLeft(true));
        $this->assertEquals('down', $this->ant->directionAfterRight(false));
        $this->assertEquals('up', $this->ant->directionAfterRight(true));

        // Check if the moveAnt function returns a correct direction
        $this->assertEquals(true, in_array($this->ant->moveAnt(), ['up','down','left','right']));
    }
}
