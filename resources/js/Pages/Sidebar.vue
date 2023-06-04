<template>
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="sidebar-switching">
                <button class="btn btn-outline-dark">食材</button>
                <button class="btn btn-outline-dark" style="margin-left: 20%;">調味料</button>
            </div>
            <div class="add">
                <input type="text" class="form-control">
                <button class="btn btn-dark">追加</button>
            </div>
            <div class="added-content">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                    <label class="form-check-label" for="switch_1">食材名ループ処理</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                    <label class="form-check-label" for="switch_1">食材名</label>
                </div>
            </div>
        </div>
        <div class="store-link">
            <button class="btn btn-light">店リスト</button>
        </div>
    </div>
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';

</script>
