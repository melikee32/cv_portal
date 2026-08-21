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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->string('name');
            $table->string('institution');
            $table->date('issue_date')->nullable();
            $table->string('certificate_url')->nullable();
            $table->string('certificate_file')->nullable();
            $table->timestamps();

            $table->foreign('candidate_id')
                ->references('id')->on('candidate_profiles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
