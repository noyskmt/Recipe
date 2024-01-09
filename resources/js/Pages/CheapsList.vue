<template>
    <div class="cheaps-list">
        <div class="best-list">
            <p class="title">最安リスト-{{ shop.name }}-</p>
            <button @click="addForm()" class="bi bi-patch-plus"></button>
            <button @click="update()" class="btn btn-light cl">更新</button>
        </div>
        <div id="add-ingredient">
            <li :key="index" class="addform">
                <select class="form">
                    <option v-for="(form, index) in cheaps">{{ form.name }}</option>
                </select>
                <!-- <input v-model="forms[index]" class="form"> -->
                <button @click="deleteForm(index)" class="bi bi-patch-minus"></button>
            </li>
        </div>
        <!-- 最初に記述していた内容 -->
        <!-- <div id="add-ingredient">
            <li v-for="(form, index) in forms" :key="index" class="addform">
                <select v-model="forms[index]" class="form"></select>
                <input v-model="forms[index]" class="form">
                <button @click="deleteForm(index)" class="bi bi-patch-minus"></button>
            </li>
        </div> -->
        <div class="col-12">
            <div class="remarks">
                <p class="title">備考</p>
                <textarea rows="20" cols="110" class="textarea"></textarea>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components: {},

    props: {
        shop: Object,
        cheaps: Array
    },

   
    data () {
        return {
            forms: [],
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