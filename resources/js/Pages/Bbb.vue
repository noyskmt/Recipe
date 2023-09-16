<template>
    <p>aaaa</p>
    <div class="add">
        <input type="text" v-model="newFood" class="form-control" name="name">
        <button @click="addFood()" class="btn btn-dark">追加</button>
    </div>
    <p>{{ food.name }}</p>
</template>

<script>
    
    export default {
        props: {
            foods: [
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
                Inertia.post('/bbb', {
                    name : this.newFood
                })
                Inertia.get('/bbb')
            }
        }

    }

</script>
