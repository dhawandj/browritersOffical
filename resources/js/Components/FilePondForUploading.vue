    <script setup>
import VueFilePond, { setOptions } from 'vue-filepond';
import { router } from '@inertiajs/vue3';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import { ref } from 'vue';
import imageCompression from 'browser-image-compression';
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

    // console.log(file);
    router.delete(route('file.delete', { fileName: file.filename }), {
        preserveScroll: true,
    });
}

function h_processFile(error,file) {
    // console.log('error',error,'file=',file);
    // console.log(file,'h_process file')
}
function h_fineshe() {
    // console.log('finesh fn()')

}
function h(file) {
    // console.log('handle',file)

}

// Compress the image file
 function compressFile(file) {
    try {
        const options = {
            maxSizeMB: 0.5, // Maximum file size in MB (0.5 MB = 500 KB)
            maxWidthOrHeight: 1024, // Max width or height of the image
            useWebWorker: true,
        };

        const compressedFile =  imageCompression(file, options);
        // console.log('Compressed file:',  compressedFile);
        return compressedFile;
    } catch (error) {
        console.error('Error while compressing image:', error);
        return file; // Return original file if compression fails
    }
}

function fileUploadHandler(book_id) {
    return {
        process: async (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {

             // if->img or file
             const formData = new FormData();
             if (file && file.type.startsWith('image/')) {

                 const compressedFile = await compressFile(file);
                 formData.append(fieldName, compressedFile, compressedFile.name);

             }else{

                formData.append(fieldName, file, file.name);

             }


            const request = new XMLHttpRequest();
            request.open('POST', route('upload', { id: book_id }));

            request.upload.onprogress = (e) => {
                progress(e.lengthComputable, e.loaded, e.total);
            };

            request.onload = function () {
                if (request.status >= 200 && request.status < 300) {
                    load(request.responseText);
                } else {
                    error('oh no');
                }
            };

            request.send(formData);

            return {
                abort: () => {
                    request.abort();
                    abort();
                },
            };
        },
        load: '/loadFiles/',
        revert: null,
    };
}

</script>
<template>
      <div class="filepond-wrapper-two">
    <FilePond
        name="file"
        v-model:files="files"
        itemInsertInterval="1000"
        maxParallelUploads="5"
        @addfile="h_processFile"
        @processfiles="h_fineshe"
        @initfile="h"
        @init="h"
        :server="fileUploadHandler(book_id)"
        allow-multiple="true"
        accepted-file-types="image/*, image/png, application/pdf"
        @removefile="h_deleteFile"
    />
</div>

</template>
<style >
/* bordered drop area */
.filepond-wrapper-two .filepond--panel-root {
    background-color: transparent;
    /* border: 2px solid#646669; */
}
/* the text color of the drop label*/
.filepond-wrapper-two .filepond--drop-label {
    color: #d1d0c5;
}

/* underline color for "Browse" button */
.filepond-wrapper-two .filepond--label-action {
    text-decoration-color: #aaa;
}
.filepond-wrapper-two .filepond--credits {
    display: none;
}
</style>
