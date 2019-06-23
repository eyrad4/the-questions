<template>
    <nav class="pagination" role="navigation" aria-label="pagination">
        <a
                class="pagination-previous"
                title="This is the first page"
                :disabled="current_page === 1"
                @click.prevent="changePage(previousPage)"
        >Previous</a>
        <a
                class="pagination-next"
                :disabled="current_page >= last_page"
                @click.prevent="changePage(nextPage)"
        >Next page</a>
        <ul class="pagination-list">
            <li
                    v-for="(page, index) in last_page"
            >
                <a
                        class="pagination-link"
                        :class="current_page === (index + 1) ? 'is-current' : ''"
                        :aria-label="`Page ${index + 1}`"
                        @click.prevent="changePage(index + 1)"
                >{{ index + 1 }}</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: {
            current_page: {
                type: Number,
                default: null
            },
            last_page: {
                type: Number,
                default: null
            },
            per_page: {
                type: Number,
                default: null
            }
        },
        computed: {
            nextPage() {
                if (this.current_page < this.last_page) return this.current_page + 1;
                else return this.current_page;
            },
            previousPage() {
                if (this.current_page > 1) return this.current_page - 1;
                else return this.current_page;
            }
        },
        methods: {
            changePage(newPage) {
                if (newPage !== this.current_page) {
                    this.$emit('pageWasChanged', newPage);
                }
            }
        }
    }
</script>

<style scoped>

</style>