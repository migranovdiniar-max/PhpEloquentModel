<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Server;
use App\Models\Client;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::query()
            ->with('client')
            ->latest()
            ->paginate(10);
        
        return view('servers.index', compact('servers'));
    }

    public function create()
    {
        $clients = Client::query()
            ->orderBy('name')
            ->get(['id', 'name']);

        return view('servers.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => ['required', 'exists:clients,id'],
            'hostname' => ['required', 'string', 'max:255'],
            'ip_address' => ['required', 'ip'],
            'os' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:active,maintenance,offline'],
        ]);

        Server::create($data);

        return redirect()
            ->route("servers.index")
            ->with("status", "Сервер успешно добавлен.");
    }
}
