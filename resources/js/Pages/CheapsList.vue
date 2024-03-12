<template>
    <div class="cheaps-list">
        <div class="best-list">
            <p class="title">最安リスト-{{ shop.name }}-</p>
            <div v-show="isToastFlug">更新しました</div>
            <button @click="addForm()" class="bi bi-patch-plus"></button>
            <button @click="update(shop.id, cheap.id)" class="btn btn-light cl">更新</button>
        </div>
        <div id="ingredient-list">
            <li v-for="(cheap, index) in cheaps" :key="index" class="added-ingredient" >
                <select class="form">
                    <option v-for="f in food" :selected="f.name == cheap.name">{{ f.name }}</option>
                </select>
                <input @change="action()" class="price-form" :value="cheap.cheaps.price" >
                <button @click="deleteForm(index)" class="bi bi-patch-minus"></button>
            </li>
            <li v-for="(form, index) in forms" :key="index" class="add-ingredient">
                <select  v-model="form.foodId" class="form">
                    <option selected value="">-選択-</option>
                    <option v-for="f in selectFood" :value="f.id">{{ f.name }}</option>
                </select>
                <input v-model="form.price" class="price-form">
                <button @click="deleteForm(index)" class="bi bi-patch-minus"></button>
            </li>

        </div>
        <div class="col-12">
            <div class="remarks">
                <p class="title">備考</p>
                <textarea v-model="remarks" rows="20" cols="110" class="textarea"></textarea>
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
            this.forms.splice(index, 1)
        },
        /**
         * 登録済みの価格に変更があったか判別
         */
        action() {
            this.isActionFlug = true
        },
        update(id) {
            if (this.isActionFlug === true) {
                this.editPrice(id);
            }
            this.addCheap();
            this.addRemarks(id);
        },
        editPrice(id) {
          const res = axios.post(`/cheap/store/${id}`, {
               price: this.price,
            })
        },
        /**
         * Cheapsリストの登録
         */
        addCheap() {
            const res = axios.post('/cheap/store', {
               forms: this.forms,
            })
            if (res.status === 200) {
                this.isToastFlug = true;
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