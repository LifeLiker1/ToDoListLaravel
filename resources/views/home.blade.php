<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
</head>
<style>
    .mainDiv {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 10px;
    }

    .taskDiv {
        border: 1px solid;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        -webkit-box-shadow: 9px 7px 13px 0px rgba(34, 60, 80, 0.2);
        -moz-box-shadow: 9px 7px 13px 0px rgba(34, 60, 80, 0.2);
        box-shadow: 9px 7px 13px 0px rgba(34, 60, 80, 0.2);
        padding-bottom: 20px;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .editModal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border: 1px solid #ccc;
        width: 30vw;
        height: 29vh;
    }

    .form {
        display: flex;
        flex-direction: column;
        justify-content: space-around
    }

    .timeAndStatus {
        width: auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 10px;
    }

    .time {
        width: 50%
    }
</style>

<body>
    @include('header', ['myTitle' => 'Мой список задач', 'buttonTitle' => 'Создать новую задачу'])
    <div class="mainDiv">
        @foreach ($tasks as $task)
            <div class="taskDiv">
                <h3>Задача: {{ $task->title }}</h3>
                <h3>Описание: {{ $task->description }}</h3>
                <div class="timeAndStatus">
                    <div class="time">
                        <p>Создана: {{ $task->created_at }}</p>
                    </div>
                    <div class="status">
                        <p>Статус:
                            @if ($task->status === 0)
                                Создана
                            @elseif($task->status === 1)
                                В работе
                            @else
                                Завершена
                            @endif
                        </p>
                    </div>
                </div>
                <button><a href={{ route('task.detailView', $task->id) }}>Детали</a></button>
            </div>
        @endforeach
    </div>
    @include('createTaskModal')

    <script>
        function openCreateModal() {
            document.getElementById('createModal').style.display = 'block';

        }

        function closeCreateModal() {
            document.getElementById('createModal').style.display = 'none';
        }
    </script>
</body>

</html>
