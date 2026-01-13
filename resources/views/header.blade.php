<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .head {
        display: flex;
        align-items: center;
        justify-content: space-around;
        background-color: rgb(48, 99, 200);
        margin-bottom: 10px;
        color: white;
    }
</style>

<?
$isHomePage = url()->current() === route('tasks.index');
?>
@if ($isHomePage)
    <div class="head">
        <h1>{{ $myTitle }}</h1>
        <button onclick=openCreateModal() class="btn btn-primary">Добавить задачу</button>
    </div>
@else
    <div class="head">
        <h1>{{ $myTitle }}</h1>
        <button class="btn btn-primary" onclick="window.location.href = `/`;">На главную</button>
    </div>
@endif
