<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Classes\Canvas;

class langtonStep2CreatePlayfieldTest extends TestCase
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
     * Test if the playfield returns the right array
     * @return void
     */
    public function testCreatePlayfield()
    {
        $this->assertEquals(
            array(array(0,0), array(0,0)),
            $this->canvas1->createPlayfield()
        );

        $this->assertEquals(
            array(array(0,0,0,0), array(0,0,0,0)),
            $this->canvas2->createPlayfield()
        );

        $this->assertEquals(
            array(array(0,0), array(0,0), array(0,0)),
            $this->canvas3->createPlayfield()
        );
    }
}
