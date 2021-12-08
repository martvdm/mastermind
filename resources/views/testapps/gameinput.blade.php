<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testen :)</title>
    <link rel="stylesheet" type="text/css" href="/css/apptest/structure.css">
</head>
<body>
@if(isset($randomgameid))
<div class="secretcodecontainer">
    {{$randomgameid[0] . $randomgameid[1] . $randomgameid[2] . $randomgameid[3]}}
</div>
@endif



<div class="rowdirector">
    <div class="selectcontainer">
        <form method="post">
            @csrf
            @for($i = 1; $i <= 4; $i++)
                <button name="selectedcolor" value="{{$i}}" type="submit" class="selectfield" id="_{{$i}}"></button>
            @endfor
        </form>

    </div>
@foreach($playboard as $stagerows)
        <div class="columndirector">
        @foreach($stagerows as $cells)

                <div class="selectfield" style="border: 2px solid black">
                {{$cells}}

                </div>
        @endforeach
        </div>
@endforeach
</div>
</body>
</html>
