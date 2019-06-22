<template>
    <div>
        <Header />

        <section class="section">
                <router-view></router-view>
        </section>

        <Footer />
    </div>
</template>

<script>
    import Header from './components/partials/Header';
    import Footer from './components/partials/Footer';
    export default {
        components: {
            Header,
            Footer
        },
        name: "App"
    }
</script>

<style scoped>

</style>