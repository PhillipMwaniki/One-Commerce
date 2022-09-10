<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Container from '@/Components/Container.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Card from "@/Components/Card.vue";
</script>

<template>
    <Head title="Roles" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles
            </h2>
        </template>

        <Container>
            <Card>
                Roles
            </Card>
        </Container>
    </AuthenticatedLayout>
</template>
