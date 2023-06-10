<template>
    <div class="sidebar">
        <div id="sidebar1">
            <div class="sidebar-switching">
                <button @click="ingredientList" class="btn btn-outline-dark">食材</button>
                <button @click="seasoningList" class="btn btn-outline-dark">調味料</button>
            </div>
            <div class="add">
                <input type="text" class="form-control">
                <button class="btn btn-dark">追加</button>
            </div>
            <div class="added-content">
                <div v-if="ingredient" key="ingredient">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">食材名ループ処理</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                        <label class="form-check-label" for="switch_1">食材名</label>
                    </div>
                </div>
                <div v-if="seasoning" key="seasoning">
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
    var app = new Vue({
        el: '#sidebar1',

        data() {
            return {
                ingredient: true,
                seasoning: false,
            };
        },

        methods: {
            ingredientList: function() {
                this.ingredientList = true;
                this.seasoningList = false;
            },
            seasoningList: function() {
                this.ingredientList = false;
                this.seasoningList = true;
            },
        }
    })
</script>
