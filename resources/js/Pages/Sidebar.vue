<template>
    <div class="menu">
        <form action="" method="get">
            <button type="button" class="btn btn-outline-dark">履歴</button>
            <button type="button" class="btn btn-outline-dark">モード</button>
            <button type="button" class="btn btn-dark">検索</button>
        </form>
    </div>
    <div class="main">
        <p>レシピサーチ</p>
    </div>
    <div class="favoriteRecipe">
        <!-- ループ処理 -->
        <tr>お気に入りしたレシピ</tr> 
    </div>
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';
    import 'bootstrap/dist/css/bootstrap.css';
    import 'bootstrap-vue/dist/bootstrap-vue.css';

</script>