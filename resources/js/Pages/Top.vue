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
                    <div v-for="fav in favorites" class="favorite-item">
                        <div class="recipe-img">
                            <img :src="fav.mediumImageUrl" alt="favorite recipe image" class="recipe-image">
                        </div>
                        <div class="recipe-details">
                            <p class="recipe-title">{{ fav.recipeTitle }}</p>
                            <p class="recipe-indication">調理時間: {{ fav.recipeIndication }}</p>
                        </div>
                        <!-- <div class="recipe-actions">
                            <button class="bi bi-flag" @click.stop="markAsMade(fav.id)"></button>
                            <button :class="isFavorite(fav.id) ? 'bi bi-star-fill' : 'bi bi-star'" @click.stop="toggleFavorite(fav.id)"></button>
                        </div> -->
                    </div>
                </div>
                <!-- 検索結果 -->
                <div v-else class="result-recipe-list">
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
                            <button :class="isFavorite(recipe.id) ? 'bi bi-star-fill' : 'bi bi-star'" @click.stop="toggleFavorite(recipe.id)"></button>
                        </div>
                    </li>
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
                favorites: [],
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
            // お気に入り追加処理
            async toggleFavorite(recipeId) {
                console.log(recipeId);
                if (this.isFavorite(recipeId)) {
                    // 解除
                    await axios.delete(`/top/favorite/recipe/${recipeId}`);
                    this.favorites = this.favorites.filter(id => id !== recipeId);
                } else {
                    // 登録
                    await axios.post(`/top/favorite/recipe/${recipeId}`);
                    this.favorites.push(recipeId);
                }
            },
            isFavorite(recipeId) {
                return this.favorites.includes(recipeId);
            },
            // 作成済み登録
            markAsMade(recipeId) {
                console.log(`過去に作ったことがある: ${recipeId}`);
                // const res = axios.get(`/top/favorite/recipe/${recipeId}`)
            },
            async getFavorites() {
                const res = await axios.get('/top/favorite');
                if (res.status === 200) {
                    this.favorites = res.data;
                }
                console.log(res.data);
            },
        },

        mounted() {
            this.getFavorites();
        }
    }

</script>
