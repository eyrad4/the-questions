<template>
    <div class="container">
        <h1 class="title">Sign In</h1>
        <div class="columns">
            <div class="column is-6 is-offset-3">

                    <div class="field">
                        <p class="control has-icons-left">
                            <input
                                class="input "
                                :class="{'is-danger': $v.email.$error}"
                                type="email"
                                v-model.trim="$v.email.$model"
                                placeholder="Email"
                            >
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </p>
                        <template v-if="$v.email.$dirty">
                            <p class="help is-danger" v-if="!$v.email.required">Email is required</p>
                            <p class="help is-danger" v-if="!$v.email.email">This email is invalid</p>
                        </template>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input
                                class="input"
                                :class="{'is-danger': $v.password.$error}"
                                type="password"
                                v-model.trim="$v.password.$model"
                                placeholder="Password"
                            >
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                        <template v-if="$v.password.$dirty">
                            <p class="help is-danger" v-if="!$v.password.required">Password is required</p>
                            <p class="help is-danger" v-if="!$v.password.minLength">Password must have at least {{ $v.password.$params.minLength.min }} characters.</p>
                        </template>
                    </div>
                    <div class="field">
                        <p class="control">
                            <button
                                @click="login"
                                class="button is-success"
                            >
                                Login
                            </button>
                        </p>
                    </div>

            </div>
        </div>
    </div>
</template>

<script>
    import { validationMixin } from 'vuelidate'
    import { required, email, minLength } from 'vuelidate/lib/validators'
    export default {
        mixins: [validationMixin],
        data() {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.$store.dispatch('login', {'email': this.email, 'password': this.password})
                        .then(() => {
                            this.$router.push({ name: 'Home'});
                        })
                        .catch(() => {
                            console.log('login error')
                        })
                }
            }
        },
        validations: {
            email: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(6)
            }
        }
    }
</script>

<style scoped>

</style>
