<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
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
            <div class="col-4">
                <sidebar class="sidebar-area"></sidebar>
                <div class="toppage-wrapper">
                    <router-view/>
                </div>
            </div>
        </div>
    </div>    
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';
    import Sidebar from './Sidebar.vue';

    export default{
        components: {
            Sidebar
        },

    }

</script>
