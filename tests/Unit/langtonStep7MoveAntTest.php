<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Classes\Ant;

class langtonStep7MoveAntTest extends TestCase
{
    private $ant;

    public function setUp()
    {
        $this->ant = new Ant(6,6,3,3);
    }

    /**
     * Test the movement of the ant
     */
    public function testMovement()
    {
        // Test if new position is correct, after movement
        $this->assertEquals(['x' => 3, 'y' => 2], $this->ant->moveUp());
        $this->assertEquals(['x' => 3, 'y' => 3], $this->ant->moveDown());
        $this->assertEquals(['x' => 2, 'y' => 3], $this->ant->moveLeft());
        $this->assertEquals(['x' => 3, 'y' => 3], $this->ant->moveRight());

        // Check if an array is returned after all movements
        $this->assertEquals(true, is_array($this->ant->move()));
    }
}
