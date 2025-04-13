<script setup>
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';

defineProps(['name', 'isNew', 'href']);
</script>
<template>
    <Link :href="href">
        <div
            class="borde relative flex h-32 w-36 flex-col justify-between rounded-3xl bg-black/50  p-3 hover:opacity-60"
        >
            <img v-if="name==='Observation'"
                src="https://srv753447.hstgr.cloud/storage/uploads2/bookimg.png"
                class=" absolute left-0 -top-4 -z-0 h-full w-full rounded-3xl opacity-75 object-fill"
                alt=""
            />
            <div class="z-10 flex justify-between">
                <div>
                    <Icon
                        class="text-white"
                        icon="fluent-emoji-high-contrast:writing-hand"
                        width="32"
                        height="32"
                    />
                </div>
                <div class="font-bold text-white backdrop-blur-sm">₹5</div>
            </div>
            <Icon
                v-if="isNew"
                class="z-10 text-primary"
                icon="clarity:new-solid"
                width="36"
                height="36"
            />

            <div
                class="flex justify-between font-bold text-white shadow-2xl backdrop-blur-sm"
            >
                <p class="text-sm/4">{{ name }} writing</p>
                <div
                    class="borde inline-flex items-end font-bold text-secondary"
                >
                    <Icon icon="weui:arrow-filled" width="12" height="24" />
                </div>
            </div>
        </div>
    </Link>
</template>
