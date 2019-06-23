<template>
    <div class="container">
        <h1 class="title">All questions</h1>
        <question-list></question-list>


    </div>
</template>

<script>
    import QuestionList from '../components/QuestionList';

    export default {
        components: {
            'question-list': QuestionList
        }
    }
</script>

<style scoped>

</style>