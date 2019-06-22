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
                            <router-link class="button is-primary" :to="{name: 'SignUp'}">
                                <strong>Sign up</strong>
                            </router-link>
                            <router-link class="button is-light" :to="{name: 'SignIn'}">
                                <strong>Sign in</strong>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    export default {
        name: "Header"
    }
</script>

<style scoped>

</style>