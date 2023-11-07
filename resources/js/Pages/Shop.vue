<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 st">
                <button v-on:click="redirectTopPage" class="btn btn-light">戻る</button>
                <!-- <div v-for="(store, index) in stores" :key="store" class="add-store"> -->
                <div class="add-store">
                    <input type="text" v-model="newShop" class="form-control">
                    <button @click="addShop()" class="btn btn-dark">追加</button>
                </div>
                <div class="added-stores">
                    <div v-for="shop in shops">
                        <label> {{ shop.name }} </label>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="best-list">
                    <p class="title">-最安リスト-</p>
                    <button @click="addForm()" class="bi bi-patch-plus"></button>
                </div>
                <div id="add-ingredient">
                    <li v-for="(form, index) in forms" :key="index" class="addform">
                        <select v-model="forms[index]" class="form"></select>
                        <input v-model="forms[index]" class="form">
                        <button @click="deleteForm(index)" class="bi bi-patch-minus"></button>
                    </li>
                </div>
                <div class="col-12">
                    <div class="remarks">
                        <p class="title">-備考-</p>
                        <textarea rows="20" cols="110" class="textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-3 sb">
                <sidebar class="sidebar"></sidebar>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from './Sidebar.vue';
// import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        Sidebar,
    },
   
    data () {
        return {
            forms: [],
            newShop: "",
            shops: [],
        }
    },

    methods: {
        /**
         * ショップの登録処理
         */
        async addShop() {
            const res = await axios.post('/shop/store', {
                name : this.newShop,
            })
            
            if (res.status === 200) {
                this.shops = res.data;
                this.newShop = "";
            }
            console.log(res.data);
        },

        /**
         * DBに登録されているショップの取得
         */
        async shopList() {
            const res = await axios.get('shop/list')
            return res.data;
        },

        addForm() {
            this.forms.push('')
        },
        deleteForm (index) {
            this.forms.splice(index, 1)
        },

        redirectTopPage() {
            location.href = '/top';
        }
    },

    /**
     * ページを読み込むたびにshopListを走らせる
     */
    async mounted() {
        this.shops = await this.shopList();
    }
}
</script>