@extends('layouts.default')
@section('content')
    <style>
        .ant-container {
            border: 1px solid #000;
            margin-bottom: 10px;
        }
        .ant-row {
            display: block;
        }
        .box {
            display: block;
            width: 5px;
            height: 5px;
            float: left;
        }
        .box-1 {
            background: #000;
        }
        .clear{
            clear: both;
        }
    </style>

    <div class="ant-container" style="width:{{$width*5}}px; height:{{$height*5}}px;">
        @foreach ($playfield as $y)
            <div class="ant-row">
                @foreach ($y as $x)
                    <div class="box box-{{$x}}"></div>
                @endforeach
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        @endforeach
    </div>

    <button onClick="window.location.reload()">Refresh</button>
@stop
