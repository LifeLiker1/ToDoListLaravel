<style>
    .head {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>

<?
$currentUrl = url()->current();
?>
@if ($currentUrl == 'http://127.0.0.1:8000')
    <div class="head">
        <h1>{{ $myTitle }}</h1>
        <button><a href={{ route('task.createTask') }}>Добавить задачу</a></button>
    </div>
@elseif($currentUrl != 'http://127.0.0.1:8000')
    <div class="head">
        <h1>{{ $myTitle }}</h1>
        <button onclick="window.history.back()">Назад</button>
    </div>
@endif
