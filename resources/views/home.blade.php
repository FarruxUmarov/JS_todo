<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .task-btn {
            margin-left: 10px;
            margin-top: 10px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const todoInput = document.getElementById('todo-input');
            const addBtn = document.getElementById('add-btn');
            const todoList = document.getElementById('todo-list');
            const todos = [];
            let editIndex = null;

            function addTask() {
                const taskText = todoInput.value.trim();
                if (taskText) {
                    if (editIndex !== null) {
                        todos[editIndex] = taskText;
                        editIndex = null;
                        addBtn.textContent = 'Add task';
                    } else {
                        todos.push(taskText);

                    }
                    todoInput.value = '';
                    renderTasks();
                }
            }

            function renderTasks() {
                todoList.innerHTML = '';
                todos.forEach((task, index) => {
                    const li = document.createElement('li');
                    li.textContent = task;

                    const updateBtn = document.createElement('button');
                    updateBtn.textContent = 'Update';
                    updateBtn.classList.add('task-btn')
                    updateBtn.addEventListener('click', () => updateTask(index));

                    const deleteBtn = document.createElement('button');
                    deleteBtn.textContent = 'Delete';
                    deleteBtn.classList.add('task-btn')
                    deleteBtn.addEventListener('click', () => removeTask(index));

                    li.appendChild(updateBtn);
                    li.appendChild(deleteBtn);
                    todoList.appendChild(li);
                });
            }

            function updateTask(index) {
                todoInput.value = todos[index];
                editIndex = index;
                addBtn.textContent = 'Update task';
            }

            function removeTask(index) {
                todos.splice(index, 1);
                renderTasks();
            }

            addBtn.addEventListener('click', addTask);
            todoInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') addTask();
            });
        });
    </script>
</head>
<body>
<h1>JavaScript Todo</h1>
<input type="text" id="todo-input" placeholder="Add a new task...">
<button id="add-btn">Add task</button>
<ul id="todo-list"></ul>
</body>
</html>
