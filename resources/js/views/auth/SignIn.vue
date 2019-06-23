<template>
    <div class="container">
        <h1 class="title">Sign In</h1>
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="email" v-model="email" placeholder="Email">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" v-model="password" placeholder="Password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-success" @click="login">
                            Login
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: null,
                password: null
            }
        },
        methods: {
            login() {
                this.$store.dispatch('login', {'email': this.email, 'password': this.password})
            }
        }
    }
</script>

<style scoped>

</style>