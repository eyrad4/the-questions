<template>
    <div class="question-list">
        <div
                class="card"
                v-for="question in questions.questions"
                :key="question.id"
        >
            <div class="card-content">
                <div class="columns">
                    <div class="column is-1 has-text-centered statistics">
                        <div class="vote">
                            <div class="is-size-5 has-text-black">{{ question.votes }}</div>
                            <div class="is-size-7 has-text-grey-light">votes</div>
                        </div>
                        <div class="answers has-best-answered">
                            <div class="is-size-5 has-text-black">10</div>
                            <div class="is-size-7 has-text-grey-light">answers</div>
                        </div>
                        <div class="views">
                            <div class="is-size-7">
                                <span class="has-text-black">{{ question.views }}</span>
                                <span class="has-text-grey-light">views</span>

                            </div>
                        </div>
                    </div>
                    <div class="column is-11">
                        <div class="title is-4"><a href="#">{{ question.title }}</a></div>
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-24x24">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="subtitle is-6">
                                    <a href="#">{{ question.user.name }}</a>,
                                    <time class="is-size-7 has-text-grey-light" :datetime="question.created_at">{{ question.created_date }}</time>
                                </p>
                            </div>
                        </div>
                        <div class="content">
                            {{ question.text }}
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <pagination
                :current_page="questions.pagination.current_page"
                :last_page="questions.pagination.last_page"
                :per_page="questions.pagination.per_page"
                @pageWasChanged="pageWasChanged"
        ></pagination>

    </div>
</template>

<script>
    import { mapState } from 'vuex';
    import Pagination from './Pagination';
    export default {
        components: {
            'pagination': Pagination
        },
        created() {
            this.fetchQuestions();
        },
        computed: {
            ...mapState({
                questions: 'questions'
            })
        },
        methods: {
            fetchQuestions() {
                this.$store.dispatch('fetchQuestions');
            },
            pageWasChanged(event) {
                this.$store.dispatch('fetchQuestions', {params: {page: event}});
            }
        }
    }
</script>

<style scoped>

</style>