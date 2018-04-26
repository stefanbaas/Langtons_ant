<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Classes\Canvas;

class langtonStep1CreateCanvasTest extends TestCase
{
    private $canvas1;
    private $canvas2;

    public function setUp()
    {
        $this->canvas1 = New Canvas(200, 200);
        $this->canvas2 = New Canvas(500, 500);
    }

    /**
     * Test if the getDimension function return the right dimensions
     * @return void
     */
    public function testCreateCanvas()
    {
        $this->assertEquals(array(200, 200), $this->canvas1->getDimensions());
        $this->assertEquals(array(500, 500), $this->canvas2->getDimensions());
    }
}
