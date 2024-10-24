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
                        <button @click="deleteHistory()" class="btn btn-dark btn-sm cal">削除</button>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
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
                recipe_title : this.editedRecipeTitle,
                created_at : this.date,
            });
            if (res.status === 200) {
                this.$emit('close');
                this.$emit('update')
            }
        },
        async deleteHistory() {
            const res = await axios.post('/calendar/history/delete', {
                created_at: this.date,
            });
            if (res.status === 200) {
                this.$emit('close');
                this.$emit('update');
            }
        },
    },
}
</script>