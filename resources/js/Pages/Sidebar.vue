<template>
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="sidebar-switching">
                <button class="btn btn-outline-dark">食材</button>
                <button class="btn btn-outline-dark" style="margin-left: 50px;">調味料</button>
            </div>
            <div class="add">
                <input type="text" v-model="add" class="form-control" style="max-width:200px;">
                <button class="btn btn-dark" style="margin-left: 10px;">追加</button>
            </div>
            <div class="added-content">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="switch_1" name="switch_1" checked>
                    <label class="form-check-label" for="switch_1">食材名ループ処理</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';

</script>

<style>
    .sidebar {
        background-color: #19197043;
        /* opacity: 0.9.5; 透過する 0に近くほど透過する */
        position: fixed; /*要素を固定する(スクロールしても位置は固定される) */
        left: 1040px;
        height: 100%; /*サイドバーの高さ*/
        width: 400px; /* サイドバーのwidthを指定 */
        max-width: 400px; /* widthの最大値 */
        /* overflow-x: hidden; 横軸ではみ出た要素を非表示にする */
        box-sizing: border-box; /* paddingとborderを、widthとheightに含める */
        padding-left: 40px; /* サイドバー内のリンクの位置を右にずらす */
    }

    .sidebar-switching {
        margin: 30px 70px; 
    }

    .add {
        display: flex;
        justify-content: center;
        padding-bottom: 30px;
    }

    .added-content{
        display: flex;
        justify-content: center;
    }


</style>