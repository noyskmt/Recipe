<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 st">
                <button class="btn btn-light">戻る</button>
                <!-- <div v-for="(store, index) in stores" :key="store" class="add-store"> -->
                <div class="add-store">
                    <input type="text" class="form-control">
                    <button class="btn btn-dark">追加</button>
                </div>
                <div class="added-stores">
                    <!-- <p> {{ store.name }} </p> -->
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                    <p>追加されたストア(ループ処理)</p>
                </div>
            </div>
            <div class="col-6">
                <div class="best-list">
                    <p class="title">-最安リスト-</p>
                    <button @click="addForm()" class="bi bi-patch-plus"></button>
                </div>
                <div id="add-ingredient">
                    <li v-for="(form, index) in forms" :key="index" class="addform">
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

export default {
    components: {
        Sidebar,
    },
    // props: {
    //     stores:[
    //         Array
    //     ]
    // },
    data () {
        return {
            forms: [],
            // name: "",
        }
    },
    methods: {
        addForm() {
            this.forms.push('')
        },

        deleteForm (index) {
            this.forms.splice(index, 1)
        },
    }
}
</script>