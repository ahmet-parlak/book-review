<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FetchBooks</title>
    <style>
        .form-input {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        @csrf
        <div class="form-input">
            <label for="publisher">Publisher:</label>
            <input id="publisehr" name="publisher" type="text">
        </div>

        <div class="form-input">
            <label for="item_count">İtem Count:</label>
            <input id="item_count" name="item_count" type="number" placeholder="max:1000">
        </div>

        <div class="form-input">
            <input type="submit" value="Fetch">
        </div>
    </form>

</body>

@if (session('success'))
    {{ session('success') }}
@endif
<div class="date">
    {{date('d.m.y_h.i.s',time())}}
</div>

</html>
