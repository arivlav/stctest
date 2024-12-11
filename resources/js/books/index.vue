<template>
    <div class="container mt-5">
        <h1 class="mb-4">Books catalog</h1>

        <div class="row mb-4">
            <div class="col-2">
                <select class="form-select form-select-sm" v-model="selectedAuthors" @change="onChange()">
                    <option value="">Все</option>
                    <option v-for="author in authors" :value="author.id_author">
                        {{ author.name }}
                    </option>
                </select>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">№ п/п</th>
                    <th scope="col">Название книги</th>
                    <th scope="col">Авторы</th>
                    <th scope="col">Количество</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(book, index) in books" :key="books.book_id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ book.book_name }}</td>
                    <td>{{ book.authors_names }}</td>
                    <td>{{ book.count_authors }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from 'vue';

export default {
    methods: {
        onChange() {
            const fetchBooks = async () => {
                try {
                    const uri = 'http://localhost:8000/api/v1/books?author=' + this.selectedAuthors;
                    const response = await axios.get(uri);
                    this.books = response.data.books;
                } catch (error) {
                    console.error('Error fetching items:', error);
                }
            };
            fetchBooks();
        }
    },
    setup() {
        const books = ref([]);
        const authors = ref([]);
        const selectedAuthors = ref();

        const fetchBooks = async () => {
            try {
                const uri = 'http://localhost:8000/api/v1/books';
                const response = await axios.get(uri);
                books.value = response.data.books;
            } catch (error) {
                console.error('Error fetching items:', error);
            }
        };

        const fetchAuthors = async () => {
            try {
                const uri = 'http://localhost:8000/api/v1/authors';
                const response = await axios.get(uri);
                authors.value = response.data.authors;
            } catch (error) {
                console.error('Error fetching items:', error);
            }
        };

        onMounted(fetchBooks);
        onMounted(fetchAuthors);

        return {
            books,
            authors,
            selectedAuthors
        };
    }
}

</script>
