<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $width = 200;
    $height = 100;

    // Create canvas
    $oCanvas = new \App\Classes\Canvas($width,$height);

    // Create playfield
    $playfield = $oCanvas->createPlayfield();

    // Get random starting point
    $randomStartingPoint = $oCanvas->createRandomStartingPoint();

    // Create ant
    $oAnt = new \App\Classes\Ant($width,$height,$randomStartingPoint['x'],$randomStartingPoint['y']);
    $ant = $oAnt->move();

    foreach($playfield AS $ykey => $y)
    {
        foreach($y AS $xkey => $x)
        {
            if(isset($ant[$ykey][$xkey])){
                $playfield[$ykey][$xkey] = $ant[$ykey][$xkey];
            }
        }
    }

    return view('pages/index', [
        'playfield' => $playfield,
        'width' => $width,
        'height' => $height
    ]);
});
