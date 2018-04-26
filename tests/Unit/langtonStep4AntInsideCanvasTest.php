<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Classes\Ant;

class langtonStepaAntInsideCanvasTest extends TestCase
{
    private $ant;

    public function setUp()
    {
        $this->ant = new Ant(6,6,3,3);
    }

    /**
     * Check if the ant is inside the canvas
     */
    public function testAntInsideCanvas()
    {
        // Check if the position is inside the canvas
        $this->assertEquals(true, $this->ant->isInsideCanvas(6,6));

        // Check if the position is not inside the canvas
        $this->assertEquals(false, $this->ant->isInsideCanvas(7,6));
    }
}
