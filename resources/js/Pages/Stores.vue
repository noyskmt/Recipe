<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 st">
                <button class="btn btn-light">戻る</button>
                <div class="add-store">
                    <input type="text" class="form-control">
                    <button class="btn btn-dark">追加</button>
                </div>
                <div class="added-stores">
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
                    <p>-最安リスト-</p>
                </div>
                <div class="container sto">
                    <!-- <div class="row"> -->
                        <div class="ssss li">
                            <div id="add-ingredient">
                                <li class="add-button">
                                    <button @click="addFormA()" class="btn btn-link">add</button>
                                </li>
                                <li v-for="(form, index) in forms" :key="index" class="ccc">
                                    <input v-model="forms[index]" class="sss">
                                    <button @click="deleteFormA(index)" class="btn btn-link">×</button>
                                </li>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="remarks">
                                <p class="tt">-備考-</p>
                                <textarea rows="10" cols="75" class="dd"></textarea>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="col-3 sb">
                <sidebar class="sidebar"></sidebar>
            </div>
        </div>
    </div>
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';
    import Sidebar from './Sidebar.vue';

    export default {
        components: {
            Sidebar,
        },

        data () {
            return {
                forms: [],
            }
        },

        methods: {
            addFormA() {
                this.forms.push('')
            },
            addFormB() {
                this.forms.push('')
            },
            addFormC() {
                this.forms.push('')
            },
         
            deleteFormA (index) {
                this.forms.splice(index, 1)
            },
            deleteFormB (index) {
                this.forms.splice(index, 1)
            },
            deleteFormC (index) {
                this.forms.splice(index, 1)
            },
        

        }
    }
   
</script>