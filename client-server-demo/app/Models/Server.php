<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id", "hostname", "ip_address", "os", "status"
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
