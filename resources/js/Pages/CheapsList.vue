<template>
    <div class="cheaps-list">
        <div class="best-list">
            <p class="title">最安リスト-{{ shop.name }}-</p>
            <div class="toas" v-show="isToastFlug">更新しました</div>
            <button class="bi bi-patch-plus" @click="addForm()"></button>
            <button class="btn btn-light cl" @click="update(shop.id)">更新</button>
        </div>
        <div id="ingredient-list">
            <li v-for="(cheap, index) in cheaps" :key="index" class="added-ingredient" >
                <select class="form">
                    <option v-for="f in food" :selected="f.name == cheap.name">{{ f.name }}</option>
                </select>
                <input  class="price-form" v-model="cheap.cheaps.price" @change="action(cheap.id, cheap.cheaps.price)">
                <button class="bi bi-patch-minus" @click="deleteForm(index)"></button>
            </li>
            <li class="add-ingredient" v-for="(form, index) in forms" :key="index">
                <select class="form" v-model="form.foodId">
                    <option selected value="">-選択-</option>
                    <option v-for="f in selectFood" :value="f.id">{{ f.name }}</option>
                </select>
                <input  class="price-form" v-model="form.price">
                <button class="bi bi-patch-minus" @click="deleteForm(index)"></button>
            </li>

        </div>
        <div class="col-12">
            <div class="remarks">
                <p class="title">備考</p>
                <textarea class="textarea" v-model="remarks" rows="20" cols="110"></textarea>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        shop: Object,
        cheaps: Array,
        food: Array,
        selectFood: Object,
    },
    data () {
        return {
            forms: [],
            remarks: this.shop.remarks,
            isToastFlug: false,
            isActionFlug: false,
            editedPrice: [{
                id: "",
                price: "",
            }]
        }
    },
    methods: {
        addForm() {
            this.forms.push({
                price: "",
                shopId: this.shop.id,
                foodId: "",
            })
        },
        deleteForm (index) {
            // this.cheap.splice(index, 1)
            this.forms.splice(index, 1)
        },
        /**
         * 登録済みの価格に変更があったか判別
         */
        action(id, price) {
            this.isActionFlug = true
            console.log(id);
            console.log(price);

        },
        update(id) {
            // if (this.isActionFlug === true) {
            //     this.editPrice(id);
            // }
            this.addCheap();
            this.addRemarks(id);
            this.editPrice(id);
        },
        editPrice(id) {
          const res = axios.post(`/cheap/update/${id}`, {
               editprice: this.editedPrice,
            })
        },
        /**
         * Cheapsリストの登録
         */
        async addCheap() {
            const res = await axios.post('/cheap/store', {
               forms: this.forms,
               
            })
            if (res.status === 200) {
                this.isToastFlug = true;
                setTimeout(() => {this.isToastFlug = false},1500)
                // this.forms = "";
            }
        },
        /**
         * 備考欄の登録
         */
        addRemarks(id) {
            axios.post(`shop/update/${id}`, {
                remarks : this.remarks,
            })
        }
        
    },
    /**
     * 登録されている備考の取得
     */
    async mounted() {
        const res = await axios.get('shop/remarks')
        this.remarks = res.data;
    },
}
</script>