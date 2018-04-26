<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Classes\Canvas;

class langtonStep3CreateRandomStartingPointTest extends TestCase
{
    private $canvas1;
    private $canvas2;
    private $canvas3;

    public function setUp()
    {
        $this->canvas1 = New Canvas(2, 2);
        $this->canvas2 = New Canvas(4, 2);
        $this->canvas3 = New Canvas(2, 3);
    }

    /**
     * Test canvas 1
     */
    public function testCanvas1()
    {
        // Create a playfield
        $playfield = $this->canvas1->createPlayfield();

        // Create a startingPoint
        $startingPoint = $this->canvas1->createRandomStartingPoint();

        // Check if the x and y position exists
        $this->assertEquals(true, isset($startingPoint['x']));
        $this->assertEquals(true, isset($startingPoint['y']));

        // Check if the x and y positions are integers
        $this->assertEquals(true, is_int($startingPoint['x']));
        $this->assertEquals(true, is_int($startingPoint['y']));

        // Check if x and y positions are inside playfield
        $this->assertTrue(isset($playfield[$startingPoint['y']][$startingPoint['x']]));
    }

    /**
     * Test canvas 2
     */
    public function testCanvas2()
    {
        // Create a playfield
        $playfield = $this->canvas2->createPlayfield();

        // Create a startingPoint
        $startingPoint = $this->canvas2->createRandomStartingPoint();

        // Check if the x and y position exists
        $this->assertEquals(true, isset($startingPoint['x']));
        $this->assertEquals(true, isset($startingPoint['y']));

        // Check if the x and y positions are integers
        $this->assertEquals(true, is_int($startingPoint['x']));
        $this->assertEquals(true, is_int($startingPoint['y']));

        // Check if x and y positions are inside playfield
        $this->assertTrue(isset($playfield[$startingPoint['y']][$startingPoint['x']]));
    }

    /**
     * Test canvas 3
     */
    public function testCanvas3()
    {
        // Create a playfield
        $playfield = $this->canvas3->createPlayfield();

        // Create a startingPoint
        $startingPoint = $this->canvas3->createRandomStartingPoint();

        // Check if the x and y position exists
        $this->assertEquals(true, isset($startingPoint['x']));
        $this->assertEquals(true, isset($startingPoint['y']));

        // Check if the x and y positions are integers
        $this->assertEquals(true, is_int($startingPoint['x']));
        $this->assertEquals(true, is_int($startingPoint['y']));

        // Check if x and y positions are inside playfield
        $this->assertTrue(isset($playfield[$startingPoint['y']][$startingPoint['x']]));
    }
}
