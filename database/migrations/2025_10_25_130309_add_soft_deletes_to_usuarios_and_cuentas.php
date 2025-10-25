<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (!Schema::hasColumn('usuarios', 'deleted_at')) {
                $table->softDeletes();
            }
        });
        
        Schema::table('cuentas', function (Blueprint $table) {
            if (!Schema::hasColumn('cuentas', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            if (Schema::hasColumn('usuarios', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
        
        Schema::table('cuentas', function (Blueprint $table) {
            if (Schema::hasColumn('cuentas', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};