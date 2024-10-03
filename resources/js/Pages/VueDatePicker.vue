<template>
    <div class="date-picker">
        <!-- v-modelを使ってバインド -->
        <VueDatePicker 
            v-model="inputDate"
            format="yyyy/MM/dd"
            model-type="yyyy-MM-dd"
        />
        {{ 2022/3/4 }}
    </div>
</template>

<script>
import { defineComponent } from '@vue/composition-api';
import { ref } from 'vue';

export default defineComponent({
    setup() {
        const inputDate = ref();

        return {
            inputDate,
        };
    },
});
</script>