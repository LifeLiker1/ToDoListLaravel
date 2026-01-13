    <div id="createModal" class="editModal">
        @include('modalHeader', ['myTitle'=> 'Добавление задачи'])
        <form method="POST" action="{{ route('task.create') }}" class="form">
            @csrf

            <input type="text" id="title" name="title" placeholder="Название задачи" required>
            <textarea id="description" name="description" placeholder="Описание задачи" rows="5" required></textarea>
            <div class="form-group">
                <label for="status">Статус:</label>
                <select id="status" name="status">
                    <option value="0" selected>Создана</option>
                    <option value="2">В работе</option>
                    <option value="1">Завершена</option>
                </select>
            </div>

            <button type="submit">Сохранить</button>
            <button type="button" onclick="closeCreateModal()">Отмена</button>
        </form>
    </div>
