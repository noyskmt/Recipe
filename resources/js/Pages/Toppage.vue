<template class="parent">
    <Slide class="child">
        <a><span class="hoge">Home1</span></a>
        <a><span class="moge">Home2</span></a>
        <a><span>Home3</span></a>
        <a><span>Home4</span></a>
    </Slide>
</template>

<script>
import { Slide } from 'vue3-burger-menu';
export default {
    components: {
        Slide
    }
}
</script>