<template>
    <div class="container">
        <div class="menu">
            <button v-on:click="redirectCalendarPage()" class="btn btn-outline-dark">カレンダー</button>
            <button class="btn btn-outline-dark mode">モード</button>
            <button v-on:click="searchRecipe()" class="btn btn-dark">検索</button>
        </div>
        <div class="main">
            <div class="title">
                <h1>レシピサーチ</h1>
            </div>
            <div class="favoriteRecipe">
                <!-- ループ処理 -->
                <div class="recipe-list">
                    <li v-for="recipe in recipes" class="recipe-item">
                        <img :src="recipe.mediumImageUrl" alt="recipe image" class="recipe-image">
                        <div class="recipe-details">
                            <h3 class="recipe-title">{{ recipe.recipeTitle }}</h3>
                            <p class="recipe-indication">調理時間: {{ recipe.recipeIndication }}</p>
                        </div>
                    </li>
                </div>
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
                <sidebar id="sidebar" class="active" :title="title"></sidebar>
            </Slide>
        </div>
    </div>   
</template>

<script>
    // import { Link } from '@inertiajs/vue3';
    import Sidebar from './Sidebar.vue';
    import { Slide } from 'vue3-burger-menu';

    export default {
        components: {
            Sidebar,
            Slide,
        },
        data() {
            return {
                recipes: [],
            }
        },

        methods: {
            redirectCalendarPage() {
                location.href = '/calendar';
            },
            async searchRecipe() {
                const res = await axios.get('/top/serch/recipe')
                if (res.status === 200) {
                    this.recipes = res.data;
                }
                console.log(this.recipes);
                // console.log(recipe.mediumImageUrl);
            },
        },
    }

</script>
