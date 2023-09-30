<template>
  <div  @click="open = true" :data-task-id="task.id" class="bg-white shadow rounded p-3 mb-3 border border-white w-full max-w-[300px] transition-all duration-300 cursor-pointer">
    <div class="flex flex-col justify-between">
      <a class="cursor-pointer text-indigo-400 font-semibold font-sans tracking-wide text-sm mb-3">{{task.title}}</a>
      <div class="flex flex-col gap-2">
        <p v-if="task.user" class="truncate text-xs"><i class="icon-user mr-2"></i>{{ task.assignee_name }}</p>
        <p v-if="task.due_date" class="text-xs"><i class="icon-calendar mr-2"></i>{{ task.formatted_due_date }}</p>
        <p v-if="task.estimate" class="text-xs"><i class="icon-clock-o mr-2"></i>{{ task.estimate_string }}</p>
      </div>
    </div>

    <Teleport to="body">
      <Modal :open="open" @close="open=false">
        <div class="h-full grid grid-cols-1 md:grid-cols-2 justify-stretch gap-7">
          <main class="flex flex-col h-full overflow-y-hidden">
            <div>
              <p class="text-xl font-bold mb-3">{{ task.title }}</p>
              <div v-if="task.description" class="p-3 bg-gray-100 rounded mb-3">
                <label class="text-sm font-bold mb-2">Description</label>
                <div v-html="task.description"></div>
              </div>
              <div class="grid grid-cols-1 lg:grid-cols-3 gap-3" :class="{ 'mb-3' : task.records.length > 0 }">
                <div v-if="task.assignee_name" class="p-3 bg-gray-100 rounded flex flex-col">
                  <label class="text-sm font-bold mb-2">Assignee</label>
                  <p>{{ task.assignee_name }}</p>
                </div>
                <div v-if="task.due_date" class="p-3 bg-gray-100 rounded flex flex-col">
                  <label class="text-sm font-bold mb-2">Due Date</label>
                  <p>{{ task.formatted_due_date }}</p>
                </div>
                <div v-if="task.estimate" class="p-3 bg-gray-100 rounded flex flex-col">
                  <label class="text-sm font-bold mb-2">Estimated Time</label>
                  <p>{{ task.estimate_string }}</p>
                </div>
              </div>
            </div>
            <template v-if="task.records.length > 0">
              <div class="flex-1 h-full overflow-y-hidden">
                <p class="text-xl font-bold pb-3">Time Log</p>
                <div class="flex-1 h-full overflow-y-auto">
                  <div class="bg-indigo-50/75 rounded mb-2 flex items-center px-3 py-2">
                    <p class="text-indigo-400 text-xs font-bold flex-1">Date</p>
                    <p class="text-indigo-400 text-xs font-bold flex-1">Start</p>
                    <p class="text-indigo-400 text-xs font-bold flex-1">End</p>
                    <p class="text-indigo-400 text-xs font-bold flex-1">Duration</p>
                    <p class="text-indigo-400 text-xs font-bold w-[75px] text-right">Billable</p>
                  </div>
                  <div v-for="record in task.records" class="bg-gray-50 border border-gray-100 rounded mb-2">
                    <div class="flex items-center p-3">
                      <p class="flex-1">{{ record.formatted_date }}</p>
                      <p class="flex-1">{{ record.formatted_start }}</p>
                      <p class="flex-1">{{ record.formatted_end }}</p>
                      <p class="flex-1">{{ record.duration }}</p>
                      <div class="w-[75px] text-right">
                        <p class="inline-block text-xs py-1 px-2 rounded-full font-bold text-white" :class="{ 'bg-indigo-400' : record.billable, 'bg-teal-400' : !record.billable }">{{ record.billable ? 'Billable' : 'Not Billable' }}</p>
                      </div>
                    </div>
                    <div v-if="record.description" class="p-3 border-t border-gray-200">
                      <p>{{ record.description }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </template>
          </main>
          <aside>
              <p class="text-xl font-bold mb-3">Comments</p>
              <p class="p-3 rounded bg-indigo-400 text-white font-bold text-lg">Coming soon</p>
          </aside>
        </div>
      </Modal>
    </Teleport>

  </div>
</template>

<script setup>

import Modal from './Modal'
import { ref } from 'vue'

const open = ref(false)

const props = defineProps({
  task: Object,
  default: {}
})

</script>
  