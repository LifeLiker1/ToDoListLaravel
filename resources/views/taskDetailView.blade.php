<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $details->title }}</title>
</head>
<style>
    .editModal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border: 1px solid #ccc;
        width: 35vw;
        height: 25vh;
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

    .form {
        display: flex;
        flex-direction: column;
        justify-content: space-around
    }

    .form-input {
        height: 40px;
        font-size: 16px;
        padding: 0 12px;
        width: auto;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .form-input:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    }
</style>

<body>
    @include('header', ['myTitle' => 'Задача ' . $details->title])
    <div class="taskDiv">

        <h1>Задача: {{ $details->title }}</h1>
        <p>Описание: {{ $details->description }}</p>
        <button onclick=openEditModal()>Изменить</button>
        @include('deleteButton')
        <div id="editModal" class="editModal">
            @include('modalHeader', ['myTitle' => 'Изменение задачи'])
            <form method="POST" action="{{ route('task.update', $details->id) }}" class="form">
                @csrf
                @method('PUT')

                <input type="text" name="title" value="{{ $details->title }}" required class="form-input">
                <textarea name="description" rows="5" class="form-input">{{ $details->description }}</textarea>
                <div class="form-group">
                    <label for="status">Статус:</label>
                    <select id="status" name="status">
                        <option value="0" {{ $details->status == '0' ? 'selected' : '' }}>
                            Создана
                        </option>
                        <option value="2" {{ $details->status == '2' ? 'selected' : '' }}>
                            В работе
                        </option>
                        <option value="1" {{ $details->status == '1' ? 'selected' : '' }}>
                            Завершена
                        </option>
                    </select>
                </div>

                <button type="submit">Сохранить</button>
                <button type="button" onclick="closeEditModal()">Отмена</button>
            </form>
        </div>

        <script>
            function openEditModal() {
                document.getElementById('editModal').style.display = 'block';
            }

            function closeEditModal() {
                document.getElementById('editModal').style.display = 'none';
            }
        </script>
    </div>
</body>

</html>
