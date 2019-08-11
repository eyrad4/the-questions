<template>
    <div class="container">
        <h1 class="title">Sign Up</h1>
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control has-icons-left">
                        <input
                            class="input"
                            :class="{'is-danger': $v.name.$error}"
                            type="text"
                            placeholder="Name"
                            v-model="$v.name.$model"
                        >
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <template v-if="$v.name.$dirty">
                        <div class="help is-danger" v-if="!$v.name.required">Name is required</div>
                        <div class="help is-danger" v-if="!$v.name.alpha">Only alpha</div>
                        <div class="help is-danger" v-if="!$v.name.minLength">Name must have at least {{ $v.name.$params.minLength.min }} characters.</div>
                        <div class="help is-danger" v-if="!$v.name.maxLength">Name must have at most {{ $v.name.$params.maxLength.max }} characters.</div>
                    </template>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left">
                        <input
                            class="input"
                            :class="{'is-danger': $v.email.$error}"
                            type="email"
                            placeholder="Email"
                            v-model="$v.email.$model"
                        >
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <template v-if="$v.email.$dirty">
                        <div class="help is-danger" v-if="!$v.email.required">Email is required</div>
                        <div class="help is-danger" v-if="!$v.email.email">This email is invalid</div>
                    </template>
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <div class="control has-icons-left">
                        <input
                            class="input"
                            :class="{'is-danger': $v.password.$error}"
                            type="password"
                            placeholder="Password"
                            v-model="$v.password.$model"
                        >
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <template v-if="$v.password.$dirty">
                        <div class="help is-danger" v-if="!$v.password.required">Password is required</div>
                        <div class="help is-danger" v-if="!$v.password.minLength">Password must have at least {{ $v.password.$params.minLength.min }} characters.</div>
                    </template>
                </div>

                <div class="field">
                    <label class="label">Confirm password</label>
                    <div class="control has-icons-left">
                        <input
                            class="input"
                            :class="{'is-danger': $v.confirmPassword.$error}"
                            type="password"
                            placeholder="Confirm password"
                            v-model="$v.confirmPassword.$model"
                        >
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <div class="help is-danger" v-if="$v.confirmPassword.$dirty && !$v.confirmPassword.sameAsPassword">Passwords must be identical.</div>
                </div>

                <div class="field">
                        <div class="control">
                            <button
                                class="button is-link"
                                @click="register"
                            >Sign Up</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { validationMixin } from 'vuelidate'
    import { required, email, minLength, maxLength, sameAs, alpha } from 'vuelidate/lib/validators'
    export default {
        mixins: [validationMixin],
        data() {
            return {
                name: '',
                email: '',
                password: '',
                confirmPassword: ''
            }
        },
        methods: {
            register() {
                this.$v.$touch();
                if (!this.$v.$invalid) {
                    this.$store.dispatch('register', {name: this.name, 'email': this.email, 'password': this.password, 'password_confirmation': this.confirmPassword})
                        .then(() => {
                            this.$router.push({ name: 'SignIn'});
                        })
                        .catch(() => {
                        })
                }
            }
        },
        validations: {
            name: {
                required,
                alpha,
                minLength: minLength(2),
                maxLength: maxLength(255)
            },
            email: {
                required,
                email
            },
            password: {
                required,
                minLength: minLength(6)
            },
            confirmPassword: {
                sameAsPassword: sameAs('password')
            }
        }
    }
</script>

<style scoped>

</style>
