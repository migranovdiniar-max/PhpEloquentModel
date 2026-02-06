<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сервера</title>
</head>
<body>
<h1>Сервера</h1>

@php
    $statusLabels = [
        'active' => 'В работе',
        'maintenance' => 'Обслуживание',
        'offline' => 'Выключен',
    ];
@endphp

@if (session('status'))
    <p style="color: green">{{ session('status') }}</p>
@endif

<p><a href="{{ route('servers.create') }}">Добавить сервер</a></p>

<table border="1" cellpadding="6" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Клиент</th>
        <th>Имя хоста</th>
        <th>IP-адрес</th>
        <th>ОС</th>
        <th>Статус</th>
        <th>Создан</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($servers as $server)
        <tr>
            <td>{{ $server->id }}</td>
            <td>{{ $server->client->name }}</td>
            <td>{{ $server->hostname }}</td>
            <td>{{ $server->ip_address }}</td>
            <td>{{ $server->os ?? '—' }}</td>
            <td>{{ $statusLabels[$server->status] ?? $server->status }}</td>
            <td>{{ $server->created_at->format('Y-m-d') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="7">Серверов нет</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div style="margin-top: 12px;">
    {{ $servers->links() }}
</div>
</body>
</html>
