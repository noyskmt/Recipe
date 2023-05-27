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
    <div>
        <sideber class="sidebar-area"></sideber>
        <div class="Toppage-wrapper text-center">
            <router-view/>
        </div>

    </div>
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';
    import 'bootstrap/dist/css/bootstrap.css';
    import 'bootstrap-vue/dist/bootstrap-vue.css';

    import Sidebar from './Sidebar.vue'

    export default {
        components: {
            Sidebar
        },
    }    

</script>

<style>
    <style scoped>
    .sidebar-area {
        /* 左側に固定 */
        float: left;
    }

    .footer-area {
        margin-top: 40px;
    }

    .scafold-wrapper {
        /* display: flex; 要素を横並びにする */
        flex-direction: column; /* 要素の並び順の主軸を指定 上 => 下 */
        min-height: 100vh; /* 要素の高さの最小値を指定 vhはviewport(表示領域) heightの略 */

     /* サイドバーのwidth分だけ範囲を削除 */
     width: calc(100% - 200px);

        /* サイドバーで隠れるので右に寄せる */
        margin: 0 0 0 180px;
    }
</style>