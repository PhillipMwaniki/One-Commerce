<script setup>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Container from '@/Components/Container.vue';
import Card from "@/Components/Card.vue";
import Buttton from "@/Components/PrimaryButton.vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { onMounted } from "vue";

const props = defineProps({
    edit: {
        type: Boolean,
        default: false
    },
    role: {
        type: Object,
        default: {}
    },
    title: {
        type: String,
        default: ''
    }
});

onMounted(() => {
    if (props.edit) {
        form.name = props.role.name;
    }
})

const form = useForm({
    name: '',
});

const submit = () => {
    props.edit
    ? form.put(route('admin.roles.update', {id: props.role.id}))
        : form.post(route('admin.roles.index'),{});
};

</script>

<template>
    <Head :title="title" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ title }}
            </h2>
        </template>

        <Container>
            <Card>
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="name" />
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <Buttton class="mt-4" :disabled="form.processing">
                        {{ form.processing ? 'Saving...' : 'Save' }}
                    </Buttton>
                </form>
            </Card>
        </Container>
    </AuthenticatedLayout>
</template>
