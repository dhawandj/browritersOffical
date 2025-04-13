
<script setup>
import { Drawer, Textarea } from 'primevue';
import FilePondForAdmin from './FilePondForAdmin.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import InputError from './InputError.vue';
defineProps(['book'])
const t_bookFiles = ref(false)
</script>
<template>

<div @click="t_bookFiles=true" class="flex p-2 bg-background rounded-lg justify-between capitalize">
    <p class="font-semibold text-gray-400" >{{ book.name }} ({{ book.book_name }})</p>
    <p>{{ book.pages }}</p>
</div>
<Drawer

        class="rounded-3xl rounded-b"
        v-model:visible="t_bookFiles"
        header="Files Info"
        position="bottom"
        style="height: 700px"
        :block-scroll="true"
    >
        <div class="overflow-scroll">
            <div class=" flex flex-col gap-5 justify-center p-2 px-4 bg-secondaryAlt  rounded-lg  capitalize">
                <InputError :message="$page.props.flash.error" class="mt-2 text-center" />
                <InputError :message="$page.props.flash.success" class="mt-2 text-center text-green-500" />
                
                <a :href="route('download.zip',{book:book})">
                    <p class="font-semibold text-center text-black rounded-lg p-2  bg-white">Download Zip  </p>
                </a>
                <Link method="delete" :href="route('delete.files',{book:book})">
                    <p class="font-semibold text-center text-white rounded-lg p-2  bg-red-500">Delete Files </p>
                </Link>
                <div class="flex p-2 bg-background rounded-lg justify-between capitalize">
                    <p class="font-semibold text-gray-400">Pen Color</p>
                    <p class="uppercase font-semibold">{{ book.pen_color }}</p>
                </div>
                <div>
                    <p class="font-semibold mb-1">remarks</p>
                    <Textarea  :fluid="true" :value="book.remarks" rows="2" cols="30" disabled autoResize />
                </div>
            </div>
            <FilePondForAdmin   :files="book.files" />
        </div>
</Drawer>
</template>