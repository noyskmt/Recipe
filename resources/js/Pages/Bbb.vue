<template>
    <div id="app">
        <h1>{{ message }}</h1>
    </div>
</template>

<script>
export default {
    name: 'app',
    data: function(){
        return {
        message : 'Hello Vuex'
    }
    }
}
</script>