    <div id="createModal" class="editModal">
        @include('modalHeader', ['myTitle' => 'Добавление задачи'])
        <form method="POST" action="{{ route('task.create') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Название задачи</label>
                <input type="text" id="title" name="title" class="form-control"
                    placeholder="Введите название задачи" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание задачи</label>
                <textarea id="description" name="description" class="form-control" placeholder="Опишите задачу..." rows="5"
                    required></textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Статус</label>
                <select id="status" name="status" class="form-select">
                    <option value="0" selected>Создана</option>
                    <option value="2">В работе</option>
                    <option value="1">Завершена</option>
                </select>
            </div>

            <div class="d-flex gap-2 mt-4 pt-3 border-top">
                <button type="submit" class="btn btn-success flex-grow-1">
                    Создать задачу
                </button>
                <button type="button" class="btn btn-warning flex-grow-1" onclick="closeCreateModal()">
                    Отмена
                </button>
            </div>
        </form>

    </div>
