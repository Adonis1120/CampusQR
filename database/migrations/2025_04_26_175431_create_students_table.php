<?php

use App\Models\User;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->string('student_number', 20)->unique()->comment('School ID number');
            $table->string('first_name', 50);
            $table->char('middle_initial', 1)->nullable();
            $table->string('last_name', 50);
            $table->string('suffix', 10)->nullable();
            $table->string('guardian_name', 100);
            $table->string('relationship', 30);
            $table->string('cp_number', 11);
            $table->string('qr_code', 100)->unique();
            $table->timestamps();
            
            $table->index(['last_name', 'first_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
