<script setup>

import Edit from "@/Components/Icons/Edit.vue";
import Delete from "@/Components/Icons/Delete.vue";

defineProps({
    editLink: {
        type: String
    },
    showEdit: {
        type: Boolean,
        default: () => true
    },
    deleteLink: {
        type: String
    },
    showDelete: {
        type: Boolean,
        default: () => true
    },
})
</script>
<template>
    <div class="flex items-center space-x-2">
        <button v-if="showEdit">
            <Link :href="editLink">
                <Edit class="w-4 h-4"/>
            </Link>
        </button>
        <button v-if="showDelete">
            <Link :href="deleteLink">
                <Delete  class="w-4 h-4"/>
            </Link>
        </button>
    </div>
</template>
