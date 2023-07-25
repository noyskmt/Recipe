<template>
    <div class="sidebar">
        <div class="sidebar-area">
            <div class="switch-btn">
                <button @click="clickTab(true)" class="btn" :class="{ 'btn-dark b': isTabFlag, 'btn-dark a': !isTabFlag}">食材</button>
                <button @click="clickTab(false)" class="btn" :class="{ 'btn-dark a': isTabFlag, 'btn-dark b': !isTabFlag }">調味料</button>
            </div>
            <div class="add">
                <input type="text" class="form-control">
                <button class="btn btn-dark">追加</button>
            </div>
            <div class="added-content">
                <div v-if="isTabFlag" key="ingredient">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label @click="openModal" class="form-check-label">食材名ループ処理</label>
                        <MyModal @close="closeModal" v-if="modal"></MyModal>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label @click="openModal" class="form-check-label">食材名</label>
                        <MyModal @close="closeModal" v-if="modal"></MyModal>
                    </div>
                </div>
                <div v-else key="seasoning">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label @click="openModal" class="form-check-label">調味料ループ処理</label>
                        <MyModal @close="closeModal" v-if="modal"></MyModal>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label @click="openModal" class="form-check-label">調味料</label>
                        <MyModal @close="closeModal" v-if="modal"></MyModal>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label @click="openModal" class="form-check-label">調味料ループ処理</label>
                        <MyModal @close="closeModal" v-if="modal"></MyModal>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label @click="openModal" class="form-check-label">調味料</label>
                        <MyModal @close="closeModal" v-if="modal"></MyModal>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label @click="openModal" class="form-check-label">調味料ループ処理</label>
                        <MyModal @close="closeModal" v-if="modal"></MyModal>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label @click="openModal" class="form-check-label">調味料</label>
                        <MyModal @close="closeModal" v-if="modal"></MyModal>
                    </div>
                </div>
            </div>
        </div>
        <div v-if= "test" class="store-link">
            <button class="btn btn-light">店リスト</button>
        </div>
    </div>
</template>

<script>
    import MyModal from './MyModal.vue';

    export default {
        components: { MyModal },
        data() {
            return {
                isTabFlag: true,
                modal: false,
            };
        },

        methods: {
            clickTab(flag) {
                this.isTabFlag = flag;
            },

            openModal() {
                this.modal = true
            },
            closeModal() {
                this.modal = false
            },
        },

        computed: {
            test() {
                return location.pathname.match(/toppage/);
            },
        },

    };
    
</script>
