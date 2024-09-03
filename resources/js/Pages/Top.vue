<template>
    <div class="container">
        <div class="menu">
            <button class="btn btn-outline-dark" @click="redirectCalendarPage()">カレンダー</button>
            <button class="btn btn-outline-dark mode" @click="favoriteRecipe()">お気に入り</button>
            <button class="btn btn-dark" @click="searchRecipe()">検索</button>
        </div>
        <div class="main">
            <div class="title">
                <h1>レシピサーチ</h1>
            </div>
            <div class="recipe">
                <!-- お気に入りリスト -->
                <div v-if="showFavorites" class="favorite-list">
                    <div v-for="fav in favorites">
                        <p>{{ fav }}</p>
                    </div>
                </div>
                <!-- 検索結果 -->
                <div v-else class="recipe-list">
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
                <!-- <div class="recipe">
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
                </div>  -->
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
                favorites: ["aaa", "bbb", "ccc"],
                showFavorites: true,
            }
        },

        methods: {
            redirectCalendarPage() {
                location.href = '/calendar';
            },
            favoriteRecipe() {
                this.showFavorites = true;
            },
            async searchRecipe() {
                const res = await axios.get('/top/serch/recipe')
                if (res.status === 200) {
                    this.recipes = res.data;
                }
                this.showFavorites = false;
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
