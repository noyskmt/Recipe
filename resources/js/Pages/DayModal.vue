<template>
    <transition name="modal" appear>
        <div class="modal modal-overlay" @click.self="$emit('close')">
            <div class="modal-window cal">
                <div class="modal-content">
                    <div class="title cal">
                        <label>{{ date.dateStr }}</label>
                    </div>
                    <div class="dish">
                        <label>料理名</label><br>
                        <input class="dish-name">
                        <button class="btn btn-dark cal">追加</button>
                    </div>
                   
                </div>
            </div>
        </div>
  </transition>
</template>

<script>
export default {
    props: {
        // date: Object
        // date: String
        date: {
            type: Array
        }
    }
}
</script>