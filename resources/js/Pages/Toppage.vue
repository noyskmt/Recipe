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
            <div class="hamburger-btn" @click='active=!active'>
                <span class="line line-top" :class="{'rotate-top':active}"></span>
                <span class="line line-middle" :class="{'rotate-middle':active}"></span>
                <span class="line line-bottom" :class="{'rotate-bottom':active}"></span>
                <transition name="hamburger-menu">
                    <div class="hambuger-menu" v-show="active">
                        <div class="col">
                            <sidebar class="sidebar-area"></sidebar>
                        </div>
                    </div>
                </transition>
                <!-- <slide>
                    <div class="col-4">
                            <slide class="sidebar-area"></slide>
                            <div class="container-fluid">
                                <router-view/>
                            </div>
                    </div>
                </slide> -->
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

        data() {
            return {
                active:false
            }
        },

    }

</script>
