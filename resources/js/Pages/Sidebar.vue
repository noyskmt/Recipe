<template>
    <div class="sidebar">
        <div class="sidebar-area">
            <div class="switch-btn">
                <button @click="clickTab(true)" class="btn" :class="{ 'btn-dark b': isTabFlag, 'btn-dark a': !isTabFlag }">食材</button>
                <button @click="clickTab(false)" class="btn" :class="{ 'btn-dark a': isTabFlag, 'btn-dark b': !isTabFlag }">調味料</button>
            </div>
            <div class="add">
                <input type="text" v-model="newFood" class="form-control">
                <button @click="addFood()" class="btn btn-dark">追加</button>
            </div>
            <div class="added-content">
                <div v-for="food in foods">
                    <div v-if="isTabFlag" key="ingredient">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                            <label @click="openModal" class="form-check-label">{{ food.name }}</label>
                            <MyModal @close="closeModal" v-if="modal"></MyModal>
                        </div>
                    </div>
                    <div v-else key="seasoning">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                            <label @click="openModal" class="form-check-label">調味料</label>
                            <MyModal @close="closeModal" v-if="modal"></MyModal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if= "storeList" class="store-link">
            <button v-on:click="redirectStorePage" class="btn btn-light">店リスト</button>
        </div>
    </div>
</template>

<script>
    import { Inertia } from "@inertiajs/inertia";
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
            clickTab(flag) {
                this.isTabFlag = flag;
            },

            openModal() {
                this.modal = true
            },
            closeModal() {
                this.modal = false
            },

            redirectStorePage() {
                location.href = '/stores';
            },

            addFood() {
                Inertia.post('/top/store', {
                    name : this.newFood
                })
                Inertia.get('/top')
            },

            async foodList() {
                const res = await axios.get('top/list')
                // console.log(res);
                console.log(res.data);
                return res.data;
                
            }
        },

        computed: {
            storeList() {
                return location.pathname.match(/top/);
            },
        },

        async mounted() {
            this.foods = await this.foodList();

        }

    };
    
</script>
