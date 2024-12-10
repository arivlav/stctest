<template>
    <div class="container mt-5">
        <h1 class="mb-4">Books catalog</h1>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                    <th scope="col">№ п/п</th>
                    <th scope="col">Название книги</th>
                    <th scope="col">Авторы</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(book, index) in books" :key="books.book_id">
                    <td>{{ index + 1 }}</td>
                    <td>{{ book.book_name }}</td>
                    <td>{{ book.authors_names }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { onMounted, ref } from 'vue';

export default {
    setup() {
        const books = ref([]);

        const fetchBooks = async () => {
            try {
                const uri = 'http://localhost:8000/api/v1/books';
                const response = await axios.get(uri);
                books.value = response.data.books;
            } catch (error) {
                console.error('Error fetching items:', error);
            }
        };

        onMounted(fetchBooks);

        return {
            books
        };
    }
}
</script>
