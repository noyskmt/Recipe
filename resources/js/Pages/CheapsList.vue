<template>
    <div class="cheaps-list">
        <div class="best-list">
            <p class="title">最安リスト-{{ shop.name }}-</p>
            <button @click="addForm()" class="bi bi-patch-plus"></button>
            <button @click="update(shop.id)" class="btn btn-light cl">更新</button>
        </div>
        <div id="add-ingredient">
            <li class="added-ingredient" v-for="(cheap, index) in cheaps" :key="index" >
                <select class="form">
                    <option v-for="f in food" :selected="f.name == cheap.name">{{ f.name }}</option>
                </select>
                <input class="price-form" :value="cheap.cheaps.price" >
                <button @click="deleteForm(index)" class="bi bi-patch-minus"></button>
            </li>
            <li v-for="(form, index) in forms" :key="index" class="addform">
                <select @change="onChange(food.id)" class="form">
                    <option selected value="">-選択-</option>
                    <option v-for="(form) in food" :key="food.id" :value="food">{{ form.name }}</option>
                </select>
                <input class="price-form">
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
        
    },
    //propsの中身を確認
    // setup(props){
    //     console.log(props.food);
    // },

    data () {
        return {
            forms: [
                {
                    price: "",
                    shopId: this.shop.id,
                    foodId: this.id
                }
            ],
            remarks: "",
        }
    },
    methods: {
        addForm() {
            this.forms.push({price:"", shopId:"", foodId:""})
        },
        deleteForm (index) {
            this.forms.splice(index, 1)
        },

        //セレクトボックス内のid取得
        onChange(id) {
            // this.forms.foodId = id;
            console.log(id);

        },
        
        // getValue(e) {
        //     console.log(e.target.previousElementSibling.value);
        // },


        update(id) {

            // const res = axios.post('/cheap/store', {
            //     price : this.price,
            //     shop_id : this.shop_id,
            //     food_id : this.food_id
            // })
            // const response = axios.post(`shop/update/${id}`, {
            //     remarks : this.remarks,
            // })
            console.log(this.forms);
            // console.log(this.cheaps);
            // console.log(this.food);
            
        }
    },
}
</script>