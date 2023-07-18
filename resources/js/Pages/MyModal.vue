<template>
    <transition name="modal" appear>
        <div class="modal modal-overlay" @click.self="$emit('close')">
            <div class="modal-window">
                <div class="modal-content">
                    <div class="title md">
                        <label>食材/調味料名</label>
                    </div>
                    <div class="best-store">
                        <label>最安店</label>
                        <div class="stores md"></div>
                    </div>
                    <div class="remarks md">
                        <label>備考</label>
                        <div class="remarks-md"></div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>