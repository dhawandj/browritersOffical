<script setup>

import InputError from '@/Components/InputError.vue';
import MyFooter from '@/Components/MyFooter.vue';
import { goBack } from '@/helper';
import { Icon } from '@iconify/vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import { InputText, Toast } from 'primevue';
import { useToast } from "primevue/usetoast";
 
 const form =  useForm({
    name:'',
    email:'',
    phone:'',
})

function submit() {
    form.post(route('jobs.register'),{
        onSuccess:(e)=>{

            // console.log(e);
            if (e.props.flash.msg) {
                show()
                setTimeout(()=> router.get(route('home')),2000)
            }
        }
    })
}

const toast = useToast();

const show = () => {
    toast.add({ severity: 'info', summary: 'Info', detail: 'Job successfully registered ', life: 3000 });
};
const toastBreakpoints = {
    '960px': { width: '50%', left: '25%' }, // For screens 960px and above
    '640px': { width: '90%', left: '5%' }, // For screens between 640px and 960px
    '0px': { width: '90%', left: '5%' }, // For screens below 640px
};
</script>

<template>
    <Head title="Jobs" />
    <div class="relative  h-full    space-y-10 bg-background text-white    ">
        <!-- nav bar -->
        <nav class="sticky left-0 top-0 flex items-center bg-secondaryAlt/45 p-3 backdrop-blur-sm">
            <Icon
                @click="goBack"
                icon="weui:back-filled"
                class="absolute ml-2 font-semibold"
                width="12"
                height="24"
            />
            <p class="flex-grow text-center">Jobs</p>
        </nav>

       

        <div class="mx-5">
            <div class="  space-y-3 max-w-sm shadow-2xl py-10 px-5 rounded-xl mx-auto">
            <p class="text-center  flex justify-center"><Icon icon="fluent-emoji-high-contrast:writing-hand" width="50" height="50" /></p> 
            <h1 class="text-xl text-center font-semibold">Register with Phone </h1>
            <h1 class="text-sm text-center font-semibold">Writing Jobs </h1>
            <p class="text-center opacity-60">Enter your email to be notified when books are available in your location</p>
            <InputText type="text" v-model="form.name" :fluid="true"  placeholder="Name"/>
            <InputError :message="form.errors.name" />
            <InputText type="number" v-model="form.phone" :fluid="true"  placeholder="Phone"/>
            <InputError :message="form.errors.phone" />
            <InputText type="email" v-model="form.email" :fluid="true"  placeholder="Email"/>
            <InputError :message="form.errors.email" />
            <button @click="submit" class="p-2 w-full rounded-md hover:opacity-40 bg-primary text-black  font-semibold">Register</button>
        </div>
        </div>
        <div v-if="$page.props.flash.msg"  class="bg-white mx-5 sm:mx-auto max-w-sm rounded-lg p-2 text-center text-secondaryAlt font-semibold">
            <p>browriters.com (Job)</p>
            <p class="text-secondary">Notified Soon to email ! </p>
        </div>
        <div class="pb-20 flex justify-center ">
                <img class="" src="http://browriters.com/storage/uploads2/Component1.svg" alt="">
        </div>
        <Toast :breakpoints="toastBreakpoints" />



        <footer class="fixed bottom-0 w-full" >
            <MyFooter />
        </footer>
    </div>
</template>
