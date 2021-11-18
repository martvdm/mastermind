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
@if(isset($gameid))

        {{$gameid[0] . $gameid[1] . $gameid[2] . $gameid[3]}}

@endif
    <form method="post">
        @csrf <label style="font-size: 25px;">Kies:<br></label>
        <select name="number">
            <option value="item-1">Item 1</option>
            <option value="item-2">Item 2</option>
            <option value="item-3">Item 3</option>
            <option value="item-4">Item 4</option>
        </select>
        <input type="submit">
    </form>

</body>
</html>
