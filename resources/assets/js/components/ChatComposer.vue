<template>
    <div class="chat-composer">
        <input type="text" placeholder="Start typing your message..." v-model="messageText" @keydown.enter="sendMessage">
        <button class="btn btn-primary" @click="sendMessage">Send</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messageText: ''
            }
        },
        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    message: this.messageText,
                    user: 'Nut Srabua'
                })
                this.messageText = ''
            }
        }
    }
</script>

<style>
    .chat-composer {
        display: flex;
    }
    .chat-composer input {
        flex: 1;
    }
    .chat-composer button {
        border-radius: 0;
    }
</style>