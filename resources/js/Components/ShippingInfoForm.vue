<script setup>
import { Icon } from '@iconify/vue';
import { FloatLabel, IconField, InputIcon, InputText } from 'primevue';
import InputError from './InputError.vue';
import { useForm } from '@inertiajs/vue3';
const props = defineProps(['order'])

const form = useForm({
    p_address: props.order.p_address??'',
    d_address: props.order.d_address??'',
    phone:props.order.phone??'',
    pincode:props.order.pincode??''
});
const submit = () => {
    form.post(route('shippingInfo',{order:props.order}), {
        onFinish: () => '',
    });
};
</script>
<template>
    <div>
        <FloatLabel variant="on"  class="myfloatlabel">
            <IconField>
                <InputText
                    class="myInput"
                    type="text"
                    :fluid="true"
                    id="p_address"
                    v-model="form.p_address"
                />
                <InputIcon>
                    <Icon icon="tdesign:location" width="24" height="24" />
                </InputIcon>
            </IconField>
            <label for="p_address" class="text-primary">Pickup Address</label>
        </FloatLabel>
        <InputError :message="form.errors.p_address" class="ml-2 mt-1" />
    </div>

    <div>
        <FloatLabel variant="on" class="myfloatlabel">
            <IconField>
                <InputText
                type="text"
                :fluid="true"
                id="d_address"
                v-model="form.d_address"
                />
                <InputIcon>
                    <Icon icon="tdesign:location" width="24" height="24" />
                </InputIcon>
            </IconField>
            <label for="d_address" class="">Drop Address</label>
        </FloatLabel>
        <InputError :message="form.errors.d_address" class="ml-2 mt-1" />
    </div>

    <div>

        <FloatLabel variant="on" class="myfloatlabel">
            <IconField>
                <InputText type="text" :fluid="true" id="pincode" v-model="form.pincode" />
                <InputIcon>
                    <Icon icon="tabler:pin" width="24" height="24" />
                </InputIcon>
            </IconField>
            <label for="pincode" class="">Pin code</label>
        </FloatLabel>
        <InputError :message="form.errors.pincode" class="ml-2 mt-1" />
    </div>
    <div>

        <FloatLabel variant="on" class="myfloatlabel">
            <IconField>
                <InputText type="text" :fluid="true" id="phone" v-model="form.phone" />
                <InputIcon>
                    <Icon icon="iconamoon:phone-light" width="24" height="24" />
                </InputIcon>
            </IconField>
            <label for="phone" class="">Phone</label>
        </FloatLabel>
        <InputError :message="form.errors.phone" class="ml-2 mt-1" />
    </div>

    <button v-if="form.isDirty" @click="submit" class="w-full rounded-lg bg-primary p-2 text-secondaryAlt">
      save
    </button>
</template>
