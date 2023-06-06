<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <button class="btn btn-outline-dark">戻る</button>
                <div class="add-store">
                    <input type="text" class="form-control">
                    <button class="btn btn-dark">追加</button>
                </div>
                <div class="added-stores">
                    <p>追加されたストア(ループ処理)</p>
                </div>
            </div>
            <div class="col-5">
                <div class="best-list">
                    <p>-最安リスト-</p>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div v-for="(text,index) in texts">
                                <input type="text" v-model="texts[index]">
                                <button class="bi bi-dash-circle-fill" type="button" @click="removeInput(index)"></button>
                            </div>
                        </div>
                        <div class="col-6">bbb 567</div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="remarks">
                    <p>-備考-</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import { Inertia } from '@inertiajs/inertia';
   
</script>