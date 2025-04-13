<script setup>
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div class="relative min-h-screen space-y-10 bg-background text-white">
        <!-- nav section -->
        <nav class="mx-2 p-2">
            <h1 class="text-2xl leading-none">
                <span class="font-semibold text-primary">bro</span>writers.com
            </h1>
            <p class="text-sm text-secondary">
                Bangalore's last minute writing app
            </p>
        </nav>

        <!-- quotion section -->
        <div class="mx-auto max-w-xs rounded-2xl p-3 text-center">
            <p class="line-clamp-3">
                “Don't stress over the writing Let us handle it ”
            </p>
        </div>

        <!-- google login btn -->
        <div class="absolute bottom-1/2 w-full">
            <a :href="route('google.login')">
                <div
                    class="mx-auto flex max-w-72 items-center justify-around rounded-xl bg-secondaryAlt p-2 font-semibold hover:bg-secondary"
                >
                    <Icon icon="devicon:google" width="35" height="35" />
                    <p>Continue with Google</p>
                </div>
            </a>
        </div>
    </div>
</template>
