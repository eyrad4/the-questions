<template>
    <div class="container">
        <h1 class="title">Sign Up</h1>
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="Text input">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                        <span class="icon is-small is-left">
                      <i class="fas fa-envelope"></i>
                    </span>
                        <span class="icon is-small is-right">
                      <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    </div>
                    <p class="help is-danger">This email is invalid</p>
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                        <input class="input" type="password" placeholder="Password">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Confirm password</label>
                    <div class="control">
                        <input class="input" type="password" placeholder="Confirm password">
                    </div>
                </div>


                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox">
                                I agree to the <a href="#">terms and conditions</a>
                            </label>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Sign Up</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SignUp"
    }
</script>

<style scoped>

</style>