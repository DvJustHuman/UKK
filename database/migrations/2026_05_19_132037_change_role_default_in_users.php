<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('pengunjung')->change();
        });

        // Ubah user yang ada dari 'user' ke 'pengunjung'
        \Illuminate\Support\Facades\DB::table('users')
            ->where('role', 'user')
            ->update(['role' => 'pengunjung']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan 'pengunjung' ke 'user'
        \Illuminate\Support\Facades\DB::table('users')
            ->where('role', 'pengunjung')
            ->update(['role' => 'user']);

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->change();
        });
    }
};
