<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 st">
                <button  class="btn btn-light" v-on:click="redirectTopPage">戻る</button>
                <div class="add-store">
                    <input class="form-control" type="text" v-model="newShop">
                    <button class="btn btn-dark" @click="addShop()">追加</button>
                </div>
                <div class="added-stores">
                    <div v-for="shop in shops">
                        <label @click="selectShop(shop)"> {{ shop.name }} </label>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <cheaps class="cheaps-list" 
                    :shop="shop" 
                    :cheaps="cheaps" 
                    :food="food" 
                    :selectFood="selectFood" 
                    v-on:updateCheaps="updateCheaps" 
                    v-on:editRemarks="editRemarks" 
                ></cheaps>
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
    data () {
        return {
            newShop: "",
            shops: [],
            firstShopData: [],
            shop: "",
            cheaps: [],
            selectFood: [],
            selectShopData: [],
            test: ['12, 13, 14. 15'],
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
         * 選択したショップのcheapsデータの取得
         */
        async selectShop(shop) {
            this.shop = shop;
            const res = await axios.post(`/shop/changeList/${shop.id}`)
            this.cheaps = res.data['changeCheaps'];
            this.shop = res.data['changeRemarks'];
        },
        /**
         * CheapsList.vueで新規追加された食材と価格を代入し、再表示
         */
        updateCheaps(addedCheaps) {
            this.cheaps = addedCheaps;
        },
        async editRemarks(remarks) {
            await axios.post('shop/update', {
                remarks: remarks
            })
        },
    },

    // computed: {
    //     $store.commit(this.test);
    // },

    async mounted() {
        /**
         * axiosでコントローラーからデータ取得
         */
        this.shops = await this.getAxios('shop/list');
        this.firstShopData = await this.getAxios('/getData');
        /**
         * コントローラーから登録されている店と食材をCheapsListに送るための処理
         */
        this.shop = this.firstShopData['firstShop'];
        this.cheaps = this.firstShopData['cheaps'];
        this.food = this.firstShopData['food'];
        this.selectFood = this.firstShopData['selectFood'];
        // $store.commit(this.firstShopData['cheaps'])

        store.commit({
            type: 'increment',
            test: this.test
        });
        console.log(this.test);
    },
}
</script>