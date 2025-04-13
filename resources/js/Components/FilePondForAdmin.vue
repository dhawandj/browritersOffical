<script setup>
import VueFilePond, { setOptions } from 'vue-filepond';
import { router } from '@inertiajs/vue3';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import { ref } from 'vue';

const props = defineProps(['book_id', 'files']);

// initilie
const FilePond = VueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
);
// files->file->url
const files = ref(
    props.files.map((file) => ({
        source: file.name,
        options: {
            type: 'local',
        },


    })),
);
function h_deleteFile(errors, file) {

    console.log(file);
    // router.delete(route('file.delete', { fileName: file.filename }), {
    //     preserveScroll: true,
    // });
}

function h_processFile(error,file) {
    // console.log('error',error,'file=',file);
    
}
function h_fineshe() {
}
</script>
<template>
      <div class="filepond-wrapper-two">
    <FilePond
        name="file"
        v-model:files="files"
        itemInsertInterval="1000"
        maxParallelUploads="5"
        :allowRemove="false"
        @addfile="h_processFile"
        @processfiles="h_fineshe"
        :server="{
            url: '',
            process: {
                url: '',
                method: 'Post',
                // onload: (response) => console.log(response,'dj') ,
                // onerror: (response) => response.data,
                // ondata: (formData) => {
                //     formData.append('Hello', 'World');
                //     return formData;
                // },
            },
            load: '/loadFiles/',
            revert: null,
        }"
        allow-multiple="true"
        accepted-file-types="image/*, image/png, application/pdf image/jpg"
        :maxFileSize="'50MB'"
        @removefile="h_deleteFile"
    />
</div>

</template>
<style >
/* bordered drop area */
.filepond-wrapper-two .filepond--panel-root {
    background-color: transparent;
    /* border: 2px solid#646669; */
    /* display: none; */
}
/* the text color of the drop label*/
.filepond-wrapper-two .filepond--drop-label {
    color: #d1d0c5;
    display: none;
}

/* underline color for "Browse" button */
.filepond-wrapper-two .filepond--label-action {
    text-decoration-color: #aaa;
}
.filepond-wrapper-two .filepond--credits {
    display: none;
}

.filepond--browser{
    display: none;
}
</style>
