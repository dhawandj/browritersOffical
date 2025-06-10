<script setup>
import { useBook } from '@/useBook';
import { Icon } from '@iconify/vue';
import { Drawer, RadioButton } from 'primevue';
import { computed, ref } from 'vue';
import FilePondForBilling from './FilePondForBilling.vue';
import TextSwiper from './TextSwiper.vue';

const props = defineProps(['book','offer']);
const dVisible = ref(false);
const penColor = ref('');
const noPages = 10;
const texts = ['Upload Topics','Upload Questions','Upload Notes','Upload Pdf',];

const books = useBook(props.book, props.book);
const length = computed(() => books.value.length + 1);

function addBook() {
    books.value.push({
        name: `book ${length.value}`,
        pages: 1,
        category: props.book,
    });
}

function deleteBook() {
    if (books.value.length > 0) {
        books.value.pop();
    } else {
        console.log('No books to delete');
    }
}

function discoutCondition(book) {
    // check book is offer is on
    if (!props.offer == 0) {
        return false
    }

    if (book.name ==='book 1') {
    // if (book.name ==='book 1'&&book.pages<=noPages) {
        return true
    }
 }
</script>
<template>
    <div class="mx-5 space-y-4 rounded-2xl bg-secondaryAlt p-3 sm:mx-auto max-w-sm">
        <div class="flex justify-around p-2 font-semibold capitalize">
            <p>books</p>
            <p>pages</p>
            <p>Uploads</p>
        </div>
        <TransitionGroup name="list">
            <li
                v-for="book in books"
                :key="book.name"
                class="flex relative list-none items-center justify-around rounded-xl bg-background py-3 "
            >
            <span v-if="discoutCondition(book)"  class="text-green-500 font-semibold absolute left-4 -top-2   bg-secondaryAlt px-2  rounded-sm border-secondary/35 border text-xs uppercase animate-pule">First 10 Pages Are Free</span>
                <div class="flex items-center gap-2">
                    <Icon icon="basil:book-outline" width="24" height="20" />
                    <p class="capitalize relative  ">{{ book.name }} </p>
                </div>
                <input
                    class="h-7 w-11 p-1 rounded-md bg-secondaryAlt text-center text-white"
                    type="number"
                    v-model="book.pages"
                />
                <button
                    class="flex items-center rounded-md bg-white p-1 text-secondaryAlt transition-all duration-300"
                    @click="dVisible = true"
                >
                    <p class="font-semibold duration-300 transition-all">Files</p>
                    <Icon icon="uil:file-upload-alt" width="24" height="20" />
                </button>
            </li>
        </TransitionGroup>

        <div class="flex justify-around">
            <button @click="deleteBook">
                <Icon
                    class="text-red-500"
                    icon="iconamoon:trash"
                    width="24"
                    height="24"
                />
            </button>
            <button class="rounded-md bg-background px-5">Auto Calc</button>
            <button @click="addBook">
                <Icon
                    class="text-green-500"
                    icon="ic:baseline-plus"
                    width="24"
                    height="24"
                />
            </button>
        </div>
    </div>
    <div
        class="mx-5 mt-1 flex items-center justify-center gap-2 text-sm text-secondary"
    >
        <Icon icon="mingcute:warning-line" width="20" height="20" />
        <p>₹5 to get one side written!</p>
        <p class="underline">why ₹5</p>
    </div>
    <!-- drawer code -->
    <Drawer
        class="rounded-3xl rounded-b max-w-xl"
        v-model:visible="dVisible"
        header="Books Uploads"
        :blockScroll="true"
        position="bottom"
        style="height: 500px"
    >
        <div>
            <!-- pen color code -->
              <div class="flex justify-between items-center p-1">
                <p class="capitalize font-semibold text-gray-400">pen Color</p>
                <div class="flex items-center gap-2  font-bold">
                    <RadioButton v-model="penColor" inputId="blue" name="blue" value="blue" class="myradiobtn" />
                    <label for="blue"><Icon icon="material-symbols-light:ink-pen" width="32" height="32" class="text-blue-500 " /></label>
                    <RadioButton v-model="penColor" inputId="black" name="black" value="black" class="myradiobtn" />
                    <label for="black"><Icon icon="material-symbols-light:ink-pen" class="text-black/65" width="32" height="32" /></label>
                </div>
            </div>
            <!-- file upload -->
            <div class="my-5">
                <div class="text-center p-1"><TextSwiper  :texts/></div>
                <FilePondForBilling />
            </div>
            <!-- info -->
            <div
                class="borde mt-5 flex items-center justify-center gap-2 rounded-lg border-gray-500 bg-secondaryAlt p-0.5 text-sm"
            >
                <Icon icon="mingcute:warning-line" width="22" height="22" />
                <p>kindly requested to provide their own books</p>
            </div>
        </div>
    </Drawer>
</template>
<style scoped>
.list-enter-active,
.list-leave-active {
    transition: all 0.2s ease;
}
.list-enter-from,
.list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}
</style>
