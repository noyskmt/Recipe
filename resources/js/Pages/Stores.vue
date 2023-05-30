<template>
    <div class="stores">
        <div class="store-list">
            <button class="btn btn-outline-dark" style="margin: 30px;">戻る</button>
            <div class="add-store">
                <input type="text" v-model="add" class="form-control" style="max-width:200px;">
                <button class="btn btn-dark" style="margin-left: 10px;">追加</button>
            </div>
            <div class="added-stores">
                <p>追加されたストア(ループ処理)</p>
            </div>
        </div>
        <div class="bestprice-list">
            <h3>-最安リスト-</h3>

        </div>
        <div class="remarks">
            <h3>-備考-</h3>

        </div>

    </div>
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';
    // import 'bootstrap/dist/css/bootstrap.css';
    // import 'bootstrap-vue/dist/bootstrap-vue.css';

</script>

<style>
    .stores {
        display: flex;
        justify-content: space-between;
    }
    
    /* .store-list{
        width: 130%;
    }

    .bestprice-list {
        width: 140%;
    }

    .remarks {
        /* width: 130%;
    } */

    .add-store {
        display: flex;
        /* justify-content: center; */
        padding-bottom: 30px;
    }

    .added-content{
        display: flex;
        /* justify-content: center; */
    }


</style>