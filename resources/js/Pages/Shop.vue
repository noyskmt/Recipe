<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 st">
                <button v-on:click="redirectTopPage" class="btn btn-light">戻る</button>
                <div class="add-store">
                    <input type="text" v-model="newShop" class="form-control">
                    <button @click="addShop()" class="btn btn-dark">追加</button>
                </div>
                <div class="added-stores">
                    <div v-for="shop in shops">
                        <label @click="selectShop(shop)"> {{ shop.name }} </label>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <cheaps :shop="shop" class="cheaps-list"></cheaps>
            </div>
            <div class="col-3 sb">
                <sidebar class="sidebar"></sidebar>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from './Sidebar.vue';
import Cheaps from './CheapsList.vue';

export default {
    components: {
        Sidebar,
        Cheaps,
    },

    props: {
        // cheaps : Array,
        // firstShop : Object
    },
   
    data () {
        return {
            newShop: "",
            shops: [],
            firstShopData: [],
            shop: this.firstShopData[firstShop],
        }
    },

    methods: {

        redirectTopPage() {
            location.href = '/top';
        },

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
            // console.log(res.data);
        },

        /**
         * DBに登録されているショップの取得
         */
        async getAxios(url) {
            const res = await axios.get(url)
            return res.data;
        },

        /**
         * ショップの情報をdataのshopに代入(CheapsList.vueに渡すため)
         */
        selectShop(shop) {
            this.shop = shop;
        }
    },

    /**
     * axiosでコントローラーからデータ取得
     */
    async mounted() {
        this.shops = await this.getAxios('shop/list');
        this.firstShopData = await this.getAxios('/getData');
        console.log(this.firstShopData);
    },
    
}
</script>