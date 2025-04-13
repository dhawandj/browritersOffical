import { ref, watch } from 'vue';

// A registry to manage state for each key independently
const stateRegistry = {};

export function useBook(book, category) {
    if (!stateRegistry[book]) {
        let storedBooks = localStorage.getItem(book);

        // Initialize a new ref for the specific book key
        stateRegistry[book] = ref(
            storedBooks
                ? JSON.parse(storedBooks)
                : [{ name: 'book 1', pages: 15, category: category }],
        );

        // Watch and sync changes to localStorage for this key
        watch(
            stateRegistry[book],
            () => {
                localStorage.setItem(
                    book,
                    JSON.stringify(stateRegistry[book].value),
                );
            },
            { deep: true },
        );
    }

    // Return the reactive ref for this specific key
    return stateRegistry[book];
}
