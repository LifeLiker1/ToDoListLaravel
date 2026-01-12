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
    }
</style>

<body>
    @include('header', ['myTitle' => 'Мой список задач', 'buttonTitle'=>"Создать новую задачу"])
    <div class="mainDiv">
        @foreach ($tasks as $task)
            <div class="taskDiv">
                <h3>{{ $task->title }}</h3>
                <h3>{{ $task->description }}</h3>
                <h3>{{ $task->status }}</h3>
                <button><a href={{ route('task.detailView', $task->id) }}>Изменить запись</a></button>
            </div>
        @endforeach
    </div>
</body>

</html>
