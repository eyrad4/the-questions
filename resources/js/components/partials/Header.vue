<template>
    <header class="header">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <router-link class="navbar-item" :to="{name: 'Home'}">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
                </router-link>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        All questions
                    </a>

                    <a class="navbar-item">
                        All categories
                    </a>

                    <a class="navbar-item">
                        Users
                    </a>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <template v-if="!auth.isAuthenticated">
                                <router-link class="button is-primary" :to="{name: 'SignUp'}">
                                    <strong>Sign up</strong>
                                </router-link>
                                <router-link class="button is-light" :to="{name: 'SignIn'}">
                                    <strong>Sign in</strong>
                                </router-link>
                            </template>
                            <template v-else>
                                <a class="button is-link">Admin panel</a>
                                <router-link class="button is-primary" :to="{name: 'SignUp'}">
                                    <strong>Profile</strong>
                                </router-link>
                                <a class="button" @click.prevent="logout">Logout</a>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    import { mapState } from 'vuex'
    export default {
        computed: {
            ...mapState({
                auth: 'auth'
            })
        },
        methods: {
            logout() {
                this.$store.dispatch('logout')
            }
        }
    }
</script>

<style scoped>

</style>
