<template>
    <transition name="modal" appear>
        <div class="modal modal-overlay" @click.self="$emit('close')">
            <div class="modal-window cal">
                <div class="modal-content">
                    <div class="title cal">
                        <label>{{ date }}</label>
                    </div>
                    <div class="dish">
                        <input v-model="editedRecipeTitle" placeholder="料理名を入力" class="dish-title">
                        <button @click="addHistory()" class="btn btn-dark btn-sm cal">保存</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        id: String,
        date: String,
        recipeTitle: String,
    },
    data() {
        return {
            editedRecipeTitle: this.recipeTitle,
        }
    },
    methods: {
        async addHistory() {
            const res = await axios.post('/calendar/history/recipe', {
                id : this.id,
                recipe_title : this.editedRecipeTitle,
                created_at : this.date,
            });
            if (res.status === 200) {
                this.$emit('close');
                this.$emit('update')
            }
        },
    },
}
</script>