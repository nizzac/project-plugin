<template>
    <button @click="open=true" class="flex items-center justify-center bg-indigo-400 text-white hover:bg-indigo-500 w-[28px] h-[28px] rounded">+</button>

    <Teleport to="body">
        <Modal :open="open" @close="open=false">
            <div>
                <form data-request="onAddTask">
                    <label for="title-input">Title</label>
                    <input id="title-input" type="text" name="title" class="form-control mb-3"/>

                    <label for="description-input">Description</label>
                    <textarea id="description-input" name="description" rows="4" class="form-control mb-3"></textarea>

                    <label for="due-date-input">Due Date</label>
                    <input id="ddue-date-input" type="date" name="due_date" class="form-control mb-3" />

                    <button class="bg-indigo-400 text-white font-bold py-2 px-3 rounded">Add Task</button>
                </form>
            </div>
        </Modal>
    </Teleport>
</template>

<script setup>

import { ref } from 'vue';
import Modal from './Modal'

const open = ref(false)

</script>