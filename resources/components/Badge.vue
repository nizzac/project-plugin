<template>
    <div
      class="px-3 h-6 rounded-full text-xs font-semibold flex items-center"
      :class="`bg-${color}-100 text-${color}-700`"
    >
      <span class="w-2 h-2 rounded-full mr-1" :class="`bg-${color}-400`"></span>
      <span>
        <slot></slot>
      </span>
    </div>
  </template>
  <script>
  export default {
    data() {
        return {
            colors: [
                'bg-purple-100 text-purple-700 bg-purple-400',
                'bg-teal-100 text-teal-700 bg-teal-400',
                'bg-blue-100 text-blue-700 bg-blue-400',
                'bg-green-100 text-green-700 bg-green-400'
            ]
        }
    },
    props: {
      color: {
        type: String,
        default: "teal"
      }
    }
  };
  </script>
  