<template>
    <transition name="modal" appear>
        <div class="modal modal-overlay" @click.self="$emit('close')">
            <div class="modal-window cal">
                <div class="modal-content">
                    <div class="title cal">
                        <label>{{ date }}</label>
                    </div>
                    <div class="dish">
                        <label>料理名</label><br>
                        <input v-model="recipeTitle" class="dish-title">
                        <button @click="addHistory()" class="btn btn-dark cal">追加</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        date: String
    },

    data() {
        return {
            recipeTitle: "",
        }
    },

    methods: {
        async addHistory() {
            const res = await axios.post('/calendar/history/recipe', {
                recipe_title : this.recipeTitle,
                created_at : this.date,
            });
            if (res.status === 200) {
                this.$emit('close');
                this.$emit('update')
            }
        }

    }

}
</script>