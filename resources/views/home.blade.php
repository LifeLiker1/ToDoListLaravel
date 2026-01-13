<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        height: auto;
    }

    .form {
        display: flex;
        flex-direction: column;
        justify-content: space-around
    }
</style>

<body>
    @include('header', ['myTitle' => 'Мой список задач', 'buttonTitle' => 'Создать новую задачу'])
    @include("filter")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($tasks as $task)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0">Задача  - {{ $task->title }}</h5>
                                </div>

                                <div class="card-body d-flex flex-column">

                                    <p class="card-text flex-grow-1">
                                        {{ Str::limit($task->description, 120) }}
                                    </p>

                                    <div class="mb-3">
                                        <span class="badge
                                    @if ($task->status === 0) bg-secondary
                                    @elseif($task->status === 2) bg-warning
                                    @else bg-success @endif">
                                            @if ($task->status === 0)
                                                Создана
                                            @elseif($task->status === 2)
                                                В работе
                                            @else
                                                Завершена
                                            @endif
                                        </span>
                                    </div>

                                    <button class="btn btn-primary mt-auto" onclick="goTo({{ $task->id }})">
                                        <i class="fas fa-eye me-1"></i> Подробнее
                                    </button>
                                </div>

                                <div class="card-footer text-muted">
                                    <small>
                                        <i class="far fa-clock me-1"></i>
                                        Создана: {{ \Carbon\Carbon::parse($task->created_at)->format('d.m.Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('createTaskModal')

    <script>
        function openCreateModal() {
            document.getElementById('createModal').style.display = 'block';

        }

        function closeCreateModal() {
            document.getElementById('createModal').style.display = 'none';
        }

        function goTo(taskId) {
            window.location.href = `/tasks/${taskId}`;
        }
    </script>
</body>

</html>
