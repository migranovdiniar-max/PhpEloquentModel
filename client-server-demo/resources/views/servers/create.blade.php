<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавить сервер</title>
</head>
<body>
<h1>Добавить сервер</h1>

<p><a href="{{ route('servers.index') }}">Назад к списку</a></p>

@php
    $statuses = [
        'active' => 'В работе',
        'maintenance' => 'Обслуживание',
        'offline' => 'Выключен',
    ];
@endphp

@if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('servers.store') }}">
    @csrf

    <div style="margin-bottom: 8px;">
        <label>Клиент</label><br>
        <select name="client_id" required>
            <option value="">— choose —</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" @selected(old('client_id') == $client->id)>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div style="margin-bottom: 8px;">
        <label>Имя хоста</label><br>
        <input type="text" name="hostname" value="{{ old('hostname') }}" required maxlength="255">
    </div>

    <div style="margin-bottom: 8px;">
        <label>IP-адрес</label><br>
        <input type="text" name="ip_address" value="{{ old('ip_address') }}" required>
    </div>

    <div style="margin-bottom: 8px;">
        <label>ОС</label><br>
        <input type="text" name="os" value="{{ old('os') }}" maxlength="255">
    </div>

    <div style="margin-bottom: 8px;">
        <label>Статус</label><br>
        <select name="status" required>
            @foreach ($statuses as $value => $label)
                <option value="{{ $value }}" @selected(old('status', 'active') === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Сохранить</button>
</form>
</body>
</html>
