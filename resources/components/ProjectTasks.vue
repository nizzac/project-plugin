<template>
    <div class="flex h-full">
        <div class="w-full h-full h-[800px] flex gap-3 overflow-x-auto overflow-y-hidden pb-12 ">
            <div v-for="(column, key) in state.tasks" class="bg-gray-100 py-3 min-w-[300px] overflow-y-hidden">
              <div class="mx-3 mb-3 flex justify-between items-center h-[28px]">
                <h3 class="font-bold">{{ column.name }}</h3>
                <NewTask v-if="column.status == 'new'"/>
              </div>
              <draggable
                class="px-3 h-full overflow-y-auto"
                :data-status="column.status"
                :list="column.tasks"
                :group="column.status"
                @end="onEnd"
                itemKey="id">
                <template #item="{element, index}">
                  <TaskCard :task="element" />
                </template>
              </draggable>
            </div>
        </div>
    </div>
</template>

<script setup>

import { onMounted, reactive } from 'vue';
import draggable from 'vuedraggable'
import NewTask from './NewTask'

const state = reactive({
  tasks: {}
})

onMounted(() => {
  getTasks()
})

function getTasks() {
  window.oc.ajax('onGetTasks', {
    success(data) {
      state.tasks = data
    }
  })
}

function onEnd(event) {
  window.oc.ajax('onUpdateTaskStatus', {
    data: {
      task: event.item.dataset.taskId,
      status: event.to.dataset.status
    }
  })

  let tasksInNewStatus = state.tasks.filter(status => {
    return status.status == event.to.dataset.status
  })

  window.oc.ajax('onUpdateTasksOrder', {
    data: {
      tasks: tasksInNewStatus[0].tasks,
      status: event.to.dataset.status
    }
  })
}
</script>