<template>
    <div class="container-modal" v-if="modalShow">
        <div class="wrapper-modal">
            <h2>やさしいProps</h2>
            <p class="text-modal">
            このように、Vue.js では Prop を使って
            親コンポーネントから値を受け取り、
            要素を表示することができます。
            </p>
        </div>
        <div class="bg-modal"></div>
    </div> 
    <!-- <button @click="modalClose">モーダルを閉じる</button> -->


</template>

<script>
  
    export default {
        name: "modalWindow",
        props: {
            modalShow: { 
                type: Boolean,
                default: false,
                required: true
            }
        },

        // methods: {
        //     modalClose() {
        //         this.$emit('is-close', false)
        //     }  
        // }
    }
    
</script>
