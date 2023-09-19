<template>
    <p>aaaa</p>
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
    
    export default {
        props: {
            bbb: [
                Array
            ]
        },

        data() {
            return {
                newFood: "",
                // bbb:[]
            }
        },

        methods:{
            addFood() {
                Inertia.post('/bbb/store', {
                    name : this.newFood
                })
                Inertia.get('/bbb')
                console.log("newFood");
            }

            // addFood() {
            //     let data = {food:this.newFood}
            //     console.log(food.name)
            //     data._token = document.getElementsByName('csrf-token')[0].name;
            //     api.postFood(JSON.stringify(data)).then(()=>{
            //         this.getFoodList()
            //     })
            // },
        }

    }

</script>
