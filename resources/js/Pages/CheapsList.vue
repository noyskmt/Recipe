<template>
    <div class="cheaps-list">
        <div class="best-list">
            <p class="title">最安リスト-{{ shop.name }}-</p>
            <div class="toas" v-show="isToastFlug">更新しました</div>
            <button class="bi bi-patch-plus" @click="addForm()"></button>
            <button class="btn btn-light cl" @click="update(shop.id)">更新</button>
        </div>
        <div id="ingredient-list">
            <li class="added-ingredient" v-for="(cheap, index) in cheaps" :key="index" >
                <select class="form">
                    <option v-for="f in food" :selected="f.name == cheap.name">{{ f.name }}</option>
                </select>
                <input  class="price-form" v-model="cheap.cheaps.price" @change="actionEdit(cheap.cheaps.id, cheap.cheaps.price)">
                <button class="bi bi-patch-minus" @click="deleteCheap(cheap.cheaps.id, index)"></button>
            </li>
            <li class="add-ingredient" v-for="(form, index) in forms" :key="index">
                <select class="form" v-model="form.foodId" @change="actionAddCheap()">
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
                <textarea class="textarea" v-model="shop.remarks" @change="actionEditRemarks(shop.id, shop.remarks)" rows="20" cols="110"></textarea>
            </div>
        </div>
    </div>
</template>

<script>
import { id } from 'date-fns/locale'

export default {
    props: {
        shop: Object,
        cheaps: Array,
        food: Array,
        selectFood: Array,
        selectShopCheaps: Array,
    },
    data () {
        return {
            forms: [],
            editedPrice: [],
            remarks: [],
            isToastFlug: false,
            isActionEditFlug: false,
            isActionAddCheapFlug: false,
            isActionAddRemarksFlug: false,
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
        deleteCheap (id, index) {
            axios.post (`/cheap/destroy/${id}`)
            this.cheaps.splice(index, 1)
        },
        deleteForm (index) {
            this.forms.splice(index, 1)
        },
        /**
         * 最安リスト追加有無のフラグ
         */
        actionAddCheap() {
            this.isActionAddCheapFlug = true
        },
        /**
         * 登録済みの価格の変更有無のフラグ
         */
        actionEdit(id, price) {
            this.isActionEditFlug = true
            this.editedPrice.push({
                id: id,
                price: price,
            })
        },
        /**
         * 備考欄の変更有無のフラグ
         */
        actionEditRemarks(id, remarks) {
            this.isActionAddRemarksFlug = true
            this.remarks.push({
                id: id,
                remarks: remarks,
            })
        },
        update() {
            if (this.isActionAddCheapFlug === true) {
                this.addCheap();
            }
            if (this.isActionEditFlug === true) {
                this.editPrice();
            }
            if (this.isActionAddRemarksFlug === true) {
                this.editRemarks();
            }
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
                this.forms = "";
                this.addedCheaps = res.data;
                this.$emit('updateCheaps', this.addedCheaps);
            }
        },
        /**
         * 登録済みの価格の変更をphp側へ送信 
         */
        async editPrice() {
            const res = await axios.post('/cheap/update', {
                editPrice: this.editedPrice,
            })
            this.isToastFlug(res);
        },
        /**
         * 備考欄の登録
         */
        editRemarks() {
            // const addedRemarksTest = this.addedRemarks;
            this.$emit("editRemarks", this.remarks);
            // console.log(this.remarks);

            // CheapsList内で登録していたときのコード
            // const res = await axios.post(`shop/update/${id}`, {
            //     remarks : this.shop.remarks,
            // })
            // console.log(res.data);
            // if (res.status === 200) {
            //     this.isToastFlug = true;
            //     setTimeout(() => {this.isToastFlug = false},1500)
            //     // this.addedRemarks = res.data;
            //     // this.$emit('addRemarks', this.addedRemarks);
            // }
        },
        isToastFlug() {
            if (res.status === 200) {
                this.isToastFlug = true;
                setTimeout(() => {this.isToastFlug = false},1500)
            }
        }
    },
    /**
     * 登録されている備考の取得
     */
    // async mounted() {
    //     const res = await axios.get('shop/remarks')
    //     this.remarks = res.data;
    // },
}
</script>