<script setup>
defineProps(['userCount','jobsCount','booksCount'])
</script>
<template>
    <div>
        <h1 class="font-semibold">Bro Statistics</h1>
        <div
            class="flex justify-between border-b border-textPrimary py-2 text-sm capitalize text-textPrimary"
        >
            <p>Students waiting for books</p>
            <p>{{ jobsCount }}</p>
        </div>
        <div
            class="flex justify-between border-b border-textPrimary py-2 text-sm capitalize text-textPrimary"
        >
            <p>Total books Ordered</p>
            <p>{{ booksCount }}</p>
        </div>
        <div
            class="flex justify-between border-b border-textPrimary py-2 text-sm capitalize text-textPrimary"
        >
            <p>Students registered</p>
            <p>{{ userCount }}</p>
        </div>
    </div>
</template>
