<template>
    <div class="sidebar">
        <div class="sidebar-area">
            <div class="switch-btn">
                <button class="btn" @click="clickTab(true)" :class="{ 'btn-dark b': isTabFlag, 'btn-dark a': !isTabFlag }">食材</button>
                <button class="btn" @click="clickTab(false)" :class="{ 'btn-dark a': isTabFlag, 'btn-dark b': !isTabFlag }">調味料</button>
            </div>
            <div class="add">
                <input class="form-control" type="text" v-model="newFood">
                <button class="btn btn-dark" @click="addFood()">追加</button>
            </div>
            <div class="added-content">
                <div v-for="food in foods">
                    <div v-if="!food.categories">
                        <div v-show="isTabFlag"  key="ingredient">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" role="switch" @click="stockTab(food.id)" :checked="food.stock">
                                <label class="form-check-label" @click="openModal">{{ food.name }}</label>
                                <MyModal  v-if="modal" @close="closeModal"></MyModal>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div v-show="!isTabFlag" key="seasoning">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" role="switch" @click="stockTab(food.id)" :checked="food.stock">
                                <label class="form-check-label" @click="openModal">{{ food.name }}</label>
                                <MyModal  v-if="modal" @close="closeModal"></MyModal>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div  class="store-link" v-if= "storeList">
            <button  class="btn btn-light" v-on:click="redirectShopPage">ショップリスト</button>
        </div>
    </div>
</template>

<script>
    import MyModal from './MyModal.vue';
    export default {
        components: { MyModal },

        data() {
            return {
                isTabFlag: true,
                modal: false,
                newFood: "",
                foods: [],
            };
        },

        methods: {
            /**
             *  食材と調味料の切り替えのためのフラグ(真偽値)設定
             */
            clickTab(flag) {
                this.isTabFlag = flag;
            },

            openModal() {
                this.modal = true
            },
            closeModal() {
                this.modal = false
            },

            /**
             *  スイッチで食材ありなしの切り替え 
             */
            stockTab(id) {
                axios.get(`/top/stock_tab/${id}`)
            },

            redirectShopPage() {
                location.href = '/shop';
            },

            /**
             *  食材と調味料の追加
             */
            async addFood() {
                let isTabFlag;
                if (this.isTabFlag) {
                    isTabFlag = 0;
                } else {
                    isTabFlag = 1;
                }

                const res =  await axios.post('/top/food', {
                    name : this.newFood,
                    categories : isTabFlag,
                    stock : 1
                })

                if (res.status === 200) {
                    this.foods = res.data;
                    this.newFood = "";
                }
            },

            /**
             * DBから食材、調味料リストの取得
             */
            async foodList() {
                const res = await axios.get('top/list')
                return res.data;
            },
        },

        /**
         * sidebar中の「店リスト」ボタンを/top時のみに表示する
         */
        computed: {
            storeList() {
                return location.pathname.match(/top/);
            },
        },

        /**
         * ページを読み込むたびにfoodListを走らせる
         */
        async mounted() {
            this.foods = await this.foodList();
        }

    };
    
</script>
