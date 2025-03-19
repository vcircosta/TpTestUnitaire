function addTask() {
    const input = document.getElementById('taskInput');
    const taskText = input.value.trim();
    if (taskText === '') return;

    const taskList = document.getElementById('taskList');
    const taskItem = document.createElement('div');
    taskItem.className = 'task-item';
    taskItem.innerHTML = `<span>`+taskText+`</span> <button onclick="removeTask(this)">Supprimer</button>`;
    
    taskList.appendChild(taskItem);
    input.value = '';
}

function removeTask(button) {
    button.parentElement.remove();
}