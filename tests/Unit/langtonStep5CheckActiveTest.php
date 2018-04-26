<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Classes\Ant;

class langtonStep5CheckActiveTest extends TestCase
{
    private $ant;

    public function setUp()
    {
        $this->ant = new Ant(6,6,3,3);
    }

    /**
     * Test the functions that change the position to active or not active
     */
    public function testIfActive()
    {
        // Check if the current position is active - Must be false
        $this->assertEquals(false, $this->ant->isActive(0,0));

        // Set the current position to active
        $this->assertEquals(true, $this->ant->setActive(0,0));

        // Check if the current position is active - Must be true
        $this->assertEquals(true, $this->ant->isActive(0,0));

        // Set the current position to not active
        $this->assertEquals(true, $this->ant->removeActive(0,0));

        // Check if the current position is active - Must be false
        $this->assertEquals(false, $this->ant->isActive(0,0));
    }
}
