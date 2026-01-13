<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Подробнее</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        height: auto;
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="card my-4">
                    <div class="card-body">

                        <div class="mb-3">
                            <h5><b>Задача:</b></h5>
                            <p class="fs-5">{{ $details->title }}</p>
                        </div>

                        <div class="mb-3">
                            <h5><b>Описание:</b></h5>
                            <div class="border rounded p-3">
                                {{ $details->description }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <h5><b>Статус:</b></h5>
                            <p class="fs-5">
                                @if ($details->status === 0)
                                    <span class="badge bg-secondary">Создана</span>
                                @elseif($details->status === 2)
                                    <span class="badge bg-warning text-dark">В работе</span>
                                @else
                                    <span class="badge bg-success">Завершена</span>
                                @endif
                            </p>
                        </div>

                        <div class="row mt-6">
                            <div class="col-md-6 mb-2">
                                <button onclick="openEditModal()" class="btn btn-primary w-100 py-2">
                                    Изменить
                                </button>
                            </div>
                            <div class="col-md-6 mb-2">
                                @include('deleteButton')
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted text-center">
                        Задача создана: {{ date('d.m.Y H:i', strtotime($details->created_at->timezone('Europe/Moscow'))) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="editModal" class="editModal">
        @include('modalHeader', ['myTitle' => 'Изменение задачи'])
        <form method="POST" action="{{ route('task.update', $details->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Заголовок задачи</label>
                <input type="text" id="title" name="title" value="{{ $details->title }}" required
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Описание задачи</label>
                <textarea id="description" name="description" rows="5" class="form-control">{{ $details->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Статус:</label>
                <select id="status" name="status" class="form-control">
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
            <div class="d-flex gap-2 mt-4 pt-3 border-top">
                <button type="button" onclick="closeEditModal()" class="btn btn-warning flex-grow-1">Отмена</button>
                <button type="submit" class="btn btn-success flex-grow-1">Сохранить</button>
            </div>
        </form>
    </div>
    </div>

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
