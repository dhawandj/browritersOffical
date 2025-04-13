  <script setup>
  import { onMounted, ref } from 'vue';
  import * as FilePond from 'filepond';
  import 'filepond/dist/filepond.css';
  import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import imageCompression from 'browser-image-compression'; // Make sure to install this: npm install browser-image-compression
import FilePondPluginPdfPreview from "filepond-plugin-pdf-preview";
import "filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.css";


  const fileInput = ref(null);
  
  onMounted(() => {
    // Compress the image file
async function compressFile(file) {
    try {
        const options = {
            maxSizeMB: 0.5, // Maximum file size in MB (0.5 MB = 500 KB)
            maxWidthOrHeight: 1024, // Max width or height of the image
            useWebWorker: true,
        };

        const compressedFile = await imageCompression(file, options);
        console.log('Compressed file:', compressedFile);
        return compressedFile;
    } catch (error) {
        console.error('Error while compressing image:', error);
        return file; // Return original file if compression fails
    }
}

    FilePond.registerPlugin(FilePondPluginImagePreview,FilePondPluginFileValidateType,FilePondPluginPdfPreview)
    FilePond.create(fileInput.value,{
        maxFiles:3,
        server:{
            url:route('upload', { id: 1 }),
            process: async (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
            // fieldName is the name of the input field
            // file is the actual file object to send
            console.log(file)
            const compressedFile = await compressFile(file);
            const formData = new FormData();
            formData.append(fieldName, file, file.name);

            const request = new XMLHttpRequest();
            request.open('POST', route('upload', { id: 1 }));

            // Should call the progress method to update the progress to 100% before calling load
            // Setting computable to false switches the loading indicator to infinite mode
            request.upload.onprogress = (e) => {
                progress(e.lengthComputable, e.loaded, e.total);
            };

            // Should call the load method when done and pass the returned server file id
            // this server file id is then used later on when reverting or restoring a file
            // so your server knows which file to return without exposing that info to the client
            request.onload = function () {
                if (request.status >= 200 && request.status < 300) {
                    // the load method accepts either a string (id) or an object
                    load(request.responseText);
                } else {
                    // Can call the error method if something is wrong, should exit after
                    error('oh no');
                }
            };

            request.send(formData);

            // Should expose an abort method so the request can be cancelled
            return {
                abort: () => {
                    // This function is entered if the user has tapped the cancel button
                    request.abort();

                    // Let FilePond know the request has been cancelled
                    abort();
                },
            };
        },
            method:'POST',
            withCredentials: false,
            onload: (response) => console.log('File uploaded successfully:', response),
            onerror: (error) => console.error('File upload error:', error),
        },
        load: '/loadFiles/',
        allowPdfPreview: true,
        pdfPreviewHeight: 320,
        pdfComponentExtraParams: 'toolbar=0&view=FitH',
        pdfPreviewEmbedded: true, 
    });
  });
  </script>
<template>
    <div class="p-3 mt-5">

        <input type="file" ref="fileInput" class="filepond"
           name="file"

           multiple />
    </div>
</template>


  