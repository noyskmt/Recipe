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
                    <li v-for="recipe in recipes" class="recipe-item" @click="goToRecipe(recipe.recipeUrl)">
                        <div class="recipe-img">
                            <img :src="recipe.mediumImageUrl" alt="recipe image" class="recipe-image">
                        </div>
                        <div class="recipe-details">
                            <p class="recipe-title">{{ recipe.recipeTitle }}</p>
                            <p class="recipe-indication">調理時間: {{ recipe.recipeIndication }}</p>
                        </div>
                        <div class="recipe-actions">
                            <button class="bi bi-flag" @click.stop="markAsMade(recipe.id)"></button>
                            <button class="bi bi-star" @click.stop="addFavorite(recipe.id)"></button>
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
                favorite: [],
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
            },
            goToRecipe(url) {
                window.open(url, '_blank');
            },
            addFavorite(recipeId) {
                console.log(`お気に入りに追加: ${recipeId}`);
                // お気に入り追加処理
            },
            markAsMade(recipeId) {
                console.log(`過去に作ったことがある: ${recipeId}`);
                // 作成済みマーク処理
            }
        },
    }

</script>
