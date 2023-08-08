<template>
    <transition name="modal-cal" appear>
        <div class="modal modal-overlay" @click.self="$emit('close')">
            <div class="modal-window">
                <div class="modal-content">
                    <div class="title md cal">
                        <label>"arg.dateStr"</label>
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
    
</script>