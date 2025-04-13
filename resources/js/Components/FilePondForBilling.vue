<script setup>
import VueFilePond from 'vue-filepond';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import { router } from '@inertiajs/vue3';
import imageCompression from 'browser-image-compression';
import { ref } from 'vue';
import { useToast } from 'primevue';

const toast = useToast();
// initliziting the file pond
const FilePond = VueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
);
// files->file->url
const files = ref([]);

function h_deleteFile(errors, file) {
    // router.delete(route('delete', { fileName: file.filename }), {
    //     preserveScroll: true,
    // });
}

function h_processFile(error, file) {
    // console.log('error', error, 'file=', file);
}
function h_fineshe() {}
const show = () => {
    toast.add({
        severity: 'warn',
        summary: 'Payment Pending',
        detail: 'Make payment to upload files ',
        life: 3000,
    });
};

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
            request.open('POST', route('dummyUpload'));

            request.upload.onprogress = (e) => {
                progress(e.lengthComputable, e.loaded, e.total);
            };

            request.onload = function () {
                if (request.status >= 200 && request.status < 300) {
                    load(request.responseText);
                } else {
                    show()
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
    <div class="filepond-wrapper-one">
        <FilePond
            name="file"
            v-model:files="files"
            itemInsertInterval="1000"
            maxParallelUploads="2"
            @addfile="h_processFile"
            @processfiles="h_fineshe"
            @onerror="h_fineshe"
            :server="fileUploadHandler(1)"
            allow-multiple="true"
            accepted-file-types="image/*, image/png, application/pdf"
            @removefile="h_deleteFile"
        />
    </div>
</template>
<style>
/* bordered drop area */
.filepond-wrapper-one .filepond--panel-root {
    background-color: #3a3b3c;
    border: 2px solid#646669;
}
/* the text color of the drop label*/
.filepond-wrapper-one .filepond--drop-label {
    color: #d1d0c5;
}

/* underline color for "Browse" button */
.filepond-wrapper-one .filepond--label-action {
    text-decoration-color: #aaa;
}
.filepond-wrapper-one .filepond--credits {
    display: none;
}
</style>
