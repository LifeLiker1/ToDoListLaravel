<style>
    .head {
        display: flex;
        align-items: center;
        justify-content: space-around;
        background-color: rgb(48, 99, 200);
        margin-bottom: 10px;
        color: white;
    }

    a {
        text-decoration: none;
        color: black;
    }
</style>

<?
$isHomePage = url()->current() === route('tasks.index');
?>
@if ($isHomePage)
    <div class="head">
        <h1>{{ $myTitle }}</h1>
        <button onclick=openCreateModal()>Добавить задачу</button>
    </div>
@else
    <div class="head">
        <h1>{{ $myTitle }}</h1>
        <button><a href={{ route('tasks.index') }}>На главную</a></button>
    </div>
@endif
