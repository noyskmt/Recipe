<template>
    <div class="example-modal-window">
        <button @click="openModal">開く</button>

        <!-- コンポーネント MyModal -->
        <MyModal @close="closeModal" v-if="modal"></MyModal>
    </div>

</template>

<script>
    import MyModal from './MyModal.vue';
    export default {
        components: { MyModal },
        data() {
            return {
                modal: false,
            }
        },
        methods: {
            openModal() {
                this.modal = true
            },
            closeModal() {
                this.modal = false
            },
        }
    }
    
    
</script>
