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
                        <label class="form-check-label" for="switch_1">食材名ループ処理</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">食材名</label>
                    </div>
                </div>
                <div v-else key="seasoning">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">調味料ループ処理</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">調味料</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">調味料ループ処理</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">調味料</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">調味料ループ処理</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">調味料</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="store-link">
            <button class="btn btn-light">店リスト</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isTabFlag: true,
            };
        },

        methods: {
            clickTab(flag) {
                this.isTabFlag = flag;
                console.log(this.isTabFlag);
            }
        }
    };
    
</script>
