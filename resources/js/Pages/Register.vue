
<template>
    <div class="container">
        <div class="main">
            <h1> レシピサーチ</h1>
            <h4> ログイン </h4>
        </div>
        <div class="account-name">
            <lavel> アカウント名 </lavel>
            <input v-model="name" type="text">
        </div>
        <div class="email">
            <lavel> メールアドレス </lavel>
            <input v-model="email" type="emal">
        </div>
        <div class="password">
            <lavel> パスワード </lavel>
            <input v-model="password" type="password">
        </div>
        <div>
            <button class="btn btn-outline-dark"> ログイン </button>
        </div> 
        
    </div>
</template>

<script>
    export default {
        data: {
            name: "",
            email: "",
            password: "",
        }
        

        // methods: {
        //     
        // }
    }
    
</script>
