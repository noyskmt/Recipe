<template>
    <div class="add">
        <input type="text" v-model="newFood" class="form-control">
        <button @click="addFood()" class="btn btn-dark">追加</button>
    </div>
    <tr v-for="bbb in bbb" :key="bbb">
        <td>{{ bbb.name }} </td>
    </tr>
</template>


<script>
    import { Inertia } from "@inertiajs/inertia";
    // import { router } from '@inertiajs/vue3';
    
    export default {
        props: {
            bbb: [
                Array
            ]
        },

        data() {
            return {
                newFood: "",
            }
        },

        methods:{
            addFood() {
                Inertia.post('/bbb/store', {
                    name : this.newFood
                })
                Inertia.get('/bbb')
                // console.log(this.newFood);
            }
        }

    }

</script>
