<template>
    <div>
        <p>window width: {{ width }}</p>
        <p>window height: {{ height }}</p>
    </div>
    <div>
        <sidebar class="sidebar-area"></sidebar>
        <div class="toppage-wrapper">
            <router-view/>
        </div>
    </div>
    <div class="toppage-wrapper">
        <div class="menu">
            <button class="btn btn-outline-dark">履歴</button>
            <button class="btn btn-outline-dark" style="margin-left: 10px;">モード</button>
            <button class="btn btn-dark" style="margin-left: 50px;">検索</button>
        </div>
        <div class="main">
            <h1>レシピサーチ</h1>
        
            <div class="favoriteRecipe">
                <!-- ループ処理 -->
                <tr>お気に入りしたレシピ</tr> 
            </div>
        </div>
    </div>
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';
    // import 'bootstrap/dist/css/bootstrap.css';
    // import 'bootstrap-vue/dist/bootstrap-vue.css';
    import Sidebar from './Sidebar.vue';

    export default{
        components: {
            Sidebar
        },

        data: function () {
            return {
                width: window.innerWidth,
                height: window.innerHeight
            }
        },

        methods: {
            handleResize: function() {
                this.width = window.innerWidth,
                this.height = window.innerHeight
            }
        },

        mounted: function() {
            window.addEventListener('resize', this.handleResize)
        },

        beforeDestroy: function () {
            window.removeEventListener('resize', this.handleResize)
        }
    }

</script>

<style>
    /* .toppage-wrapper { */
        /* float: left; */

        /* サイドバーのwidth分だけ範囲を削除 */
        /* width: calc(100% - 700px); */

        /* サイドバーで隠れるので右に寄せる */
        /* margin: 0 0 0 180px; */
    /* } */

    .menu {
        padding: 30px 30px 30px 730px;
    }

    .main {
        width: 100%;
        margin: 50px 410px;
    }

    .favoriteRecipe {
        margin: 20px 40px;
    }

</style>