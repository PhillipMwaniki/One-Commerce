<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Container from '@/Components/Container.vue';
import Card from "@/Components/Card.vue";
import Table from "@/Components/Table/Table.vue";
import Td from "@/Components/Table/Td.vue";
import Actions from "@/Components/Table/Actions.vue";
import Buttton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    roles: {
        type: Object,
        default: () => ({})
    },
    headers: {
        type: Array,
        default: []
    }
});

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
            <Buttton :href="route('admin.roles.create')">Create</Buttton>
            <Card class="mt-4">
                <Table :headers="headers" :items="roles">
                    <template v-slot="{ item }">
                        <Td>{{ item.name }}</Td>
                        <Td>{{ item.created_at_formatted }}</Td>
                        <Td><Actions :edit-link="route('admin.roles.edit', { id: item.id})" /></Td>
                    </template>
                </Table>
            </Card>
        </Container>
    </AuthenticatedLayout>
</template>
