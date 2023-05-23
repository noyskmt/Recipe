<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
        </style>
    </head>
    <body>
        <div class="menu">
            <form action="" method="get">
                @csrf
                <button type="submit" class="btn btn-primary">履歴</button>
                <button type="submit" class="btn btn-primary">モード</button>
                <button type="submit" class="btn btn-primary">検索</button>
            </form>
        </div>
        <div class="main">
            <p>レシピサーチ</p>
        </div>
        <div class="favoriteRecipe">
            <!-- ループ処理 -->
            <tr>お気に入りしたレシピ</tr> 
        </div>

        
    </body>
</html>
