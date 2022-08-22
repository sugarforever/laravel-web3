<script setup>

import { ref } from 'vue';

const messages = ref([]);

window.Echo.channel('102').listen('MessagePushed', e => {
    messages.value.push(e.payload)
});
</script>
 
<template>
    <h1>ChatRoom #1</h1>

    <div class="py-12" v-for="(message, index) in messages" :key="index" v-text="message">
    </div>
</template>