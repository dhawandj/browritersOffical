<script setup>
import { Icon } from '@iconify/vue';
import { ref } from 'vue';
import FilePondForUploading from './FilePondForUploading.vue';
import { Drawer, FloatLabel, InputText, RadioButton, Textarea } from 'primevue';
import { useForm } from '@inertiajs/vue3';
const props = defineProps(['book'])
const toggle = ref(false);
const t_options = ref(false);
const penColor = ref('');

const form = useForm({
    book_name: props.book.book_name??'',
    pen_color: props.book.pen_color??'',
    remarks:props.book.remarks??'',
});
const submit = () => {
    form.post(route('bookOptions',{book:props.book}), {
        onFinish: () => '',
    });
};
</script>
<template>
    <div class="mx- rounded- border-b border-background bg-secondaryAlt p-2 hover:opacity-80  ">
        <div
            @click="toggle = !toggle"
            class="flex items-center justify-between p-1"
        >
            <div class="flex items-center gap-2">
                <Icon icon="basil:book-outline" width="24" height="24" />
                <p class="capitalize">{{ book.name }} <span class="text-xs opacity-25">({{book.book_name}})</span> </p>
            </div>
            <Icon
                v-if="!toggle"
                icon="iconamoon:arrow-down-2-duotone"
                width="24"
                height="24"
            />
            <Icon
                v-if="toggle"
                icon="iconamoon:arrow-up-2-duotone"
                width="24"
                height="24"
            />
        </div>
        <div v-show="toggle" class=" text-secondary p-1">
            <div class="p-1 capitalize flex justify-between">
                <p>pages:{{book.pages }}</p>
                <Icon
                @click="t_options = true"
                icon="material-symbols:edit-outline-sharp"
                width="24"
                class=" text-white/75"
                height="24"/>
            </div>
                <FilePondForUploading :files="book.files" :book_id="book.id" />
        </div>
    </div>
    <!-- options drawer her -->
    <Drawer
        class="rounded-3xl rounded-b max-w-xl"
        v-model:visible="t_options"
        header="Book Options"
        position="bottom"
        style="height: 500px"
        :blockScroll="true"
    >
        <div class="p-2 space-y-5">
            <div class="text-end">
                <Transition> <button @click="submit" v-show="form.isDirty" class="bg-white text-secondaryAlt p-1.5 px-3 rounded-lg font-semibold w-full">save</button></Transition>
            </div>
            <div>

                <FloatLabel variant="on" class="myfloatlabel">
                    <InputText id="on_label" v-model="form.book_name" autocomplete="off" :fluid="true" />
                    <label for="on_label" class="capitalize">{{ book.name }} (name)</label>
                </FloatLabel>
            </div>

            <div class="flex justify-between items-center p-1">
                <p class="capitalize font-semibold text-gray-400">pen Color</p>
                <div class="flex items-center gap-2  font-bold">
                    <RadioButton v-model="form.pen_color" inputId="blue" name="blue" value="blue" class="myradiobtn" />
                    <label for="blue"><Icon icon="material-symbols-light:ink-pen" width="32" height="32" class="text-blue-500 " /></label>
                    <RadioButton v-model="form.pen_color" inputId="black" name="black" value="black" class="myradiobtn" />
                    <label for="black"><Icon icon="material-symbols-light:ink-pen" class="text-black/65" width="32" height="32" /></label>
                </div>
            </div>

            <div>
                <FloatLabel variant="on" class="myfloatlabel">
                    <Textarea placeholder=" Ex. skip page 15-20" id="over_label" class="placeholder:pt-5" v-model="form.remarks" rows="3" cols="30" style="resize: none;background-color:#2f3032;" :fluid="true"  />
                    <label for="on_label">Any Book Remarks</label>
                </FloatLabel>
            </div>

          

        </div>
    </Drawer>
</template>
<style>

/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
  transition: opacity 0.2s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>