<template>
    <div class="container">
        <div class="menu">
            <button class="btn btn-outline-dark">履歴</button>
            <button class="btn btn-outline-dark mode">モード</button>
            <button class="btn btn-dark">検索</button>
        </div>
        <div class="main">
            <div class="title">
                <h1>レシピサーチ</h1>
            </div>
            <div class="favoriteRecipe">
                <!-- ループ処理 -->
                <div class="recipe">
                    <p>お気に入りしたレシピ</p>
                    <i class="bi bi-star-fill"></i>
                </div>
                <div class="recipe">
                    <p>お気に入りしたレシピ</p>
                    <i class="bi bi-star-fill"></i>
                </div> 
                <div class="recipe">
                    <p>お気に入りしたレシピ</p>
                    <i class="bi bi-star"></i>
                </div> 
                <div class="recipe">
                    <p>お気に入りしたレシピ</p>
                    <i class="bi bi-star-fill"></i>
                </div> 
                <div class="recipe">
                    <p>お気に入りしたレシピ</p>
                    <i class="bi bi-star"></i>
                </div> 
                <div class="recipe">
                    <p>お気に入りしたレシピ</p>
                    <i class="bi bi-star"></i>
                </div> 
                <div class="recipe">
                    <p>お気に入りしたレシピ</p>
                    <i class="bi bi-star"></i>
                </div> 
            </div>
        </div>
        <div class="slide">
            <Slide right class=“list”>
                <sidebar id="sidebar" class="active"></sidebar>
            </Slide>
        </div>
    </div>   
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';
    import Sidebar from './Sidebar.vue';
    import { Slide } from 'vue3-burger-menu';

    export default{
        components: {
            Sidebar,
            Slide
        },

        data() {
            return {
                
            }
        },

    }

    // let switchBtn = document.getElementsByTagName('bm-burger-button')[0];
    // let sidebar = document.getElementById('sidebar');

    // let changeElement = (el)=> {
    //     el.classList.toggle('active');
    // }

    // switchBtn.addEventListener('click', ()=> {
    //     changeElement(sidebar);
    // }, false);

</script>
