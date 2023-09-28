import { createApp } from "vue";
import ProjectTasks from './components/ProjectTasks'
import TaskCard from './components/TaskCard'
import Badge from './components/Badge'

let app = createApp();
app.component('project-tasks', ProjectTasks);
app.component('TaskCard', TaskCard);
app.component('Badge', Badge);
app.mount("#project-tasks");