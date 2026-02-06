<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();

            $table->string('hostname');
            $table->string('ip_address');
            $table->string('os')->nullable();
            $table->string('status')->default('active'); 

            $table->timestamps();

            $table->index(['client_id', 'hostname']);
            $table->unique(['client_id', 'hostname']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
