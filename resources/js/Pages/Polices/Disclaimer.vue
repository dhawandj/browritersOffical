<script setup>

import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Polices" />
    <div class="relative  h-svh   space-y-10 bg-background text-white    ">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">DISCLAIMER</p>
        </nav>

        <div class="container mx-auto p-4 text-gray-800">
        <div class="bg-white rounded-2xl shadow-lg p-6 md:p-12">
            <h1 class="text-3xl font-bold mb-4">Disclaimer</h1>
            <p class="text-sm text-gray-500 mb-6">Last updated: January 27, 2025</p>

            <div class="space-y-6">
                <section>
                <h2 class="text-2xl font-bold mb-2">Disclaimer</h2>
                <p>
                    The information contained on the Service is for general information purposes only. The Company assumes no responsibility for errors or omissions in the contents of the Service.
                </p>
                <p>
                    The Company does not warrant that the Service is free of viruses or other harmful components.
                </p>
                </section>

                <section>
                <h2 class="text-2xl font-bold mb-2">External Links Disclaimer</h2>
                <p>
                    The Service may contain links to external websites that are not provided or maintained by or in any way affiliated with the Company. The Company does not guarantee the accuracy or completeness of information on these external websites.
                </p>
                </section>

                <section>
                <h2 class="text-2xl font-bold mb-2">Errors and Omissions Disclaimer</h2>
                <p>
                    The Company is not responsible for any errors or omissions or for the results obtained from the use of this information. The information provided is for general guidance only.
                </p>
                </section>

                <section>
                <h2 class="text-2xl font-bold mb-2">Fair Use Disclaimer</h2>
                <p>
                    The Company may use copyrighted material under "fair use" for purposes such as criticism, comment, news reporting, teaching, scholarship, or research. If You wish to use copyrighted material beyond fair use, You must obtain permission from the copyright owner.
                </p>
                </section>

                <section>
                <h2 class="text-2xl font-bold mb-2">Views Expressed Disclaimer</h2>
                <p>
                    The views and opinions expressed within the Service are those of the authors and do not necessarily reflect the official policy or position of the Company.
                </p>
                </section>

                <section>
                <h2 class="text-2xl font-bold mb-2">"Use at Your Own Risk" Disclaimer</h2>
                <p>
                    All information in the Service is provided "as is", without any warranty of any kind. The Company will not be liable for any decision made or action taken based on the information provided by the Service.
                </p>
                </section>

                <section>
                <h2 class="text-2xl font-bold mb-2">Contact Us</h2>
                <p>
                    If you have any questions about this Disclaimer, You can contact us at: <strong>support@browriters.com<</strong>
                </p>
                </section>
            </div>
        </div>
        </div>




        <footer class="fixed bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
