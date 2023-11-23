<template>
    <div class="cheaps-list">
        <div class="best-list">
            <p class="title">-最安リスト-{{ shopId }}-</p>
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
</template>

<script>
// import { Inertia } from "@inertiajs/inertia";

export default {
    components: {},

    props: {
        shopId: Number,
    },
   
    data () {
        return {
            forms: [],
            // newShop: "",
            // shops: [],
        }
    },

    methods: {
        addForm() {
            this.forms.push('')
        },
        deleteForm (index) {
            this.forms.splice(index, 1)
        },

    },

}
</script>