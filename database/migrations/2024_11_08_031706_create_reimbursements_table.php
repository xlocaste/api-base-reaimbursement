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
        Schema::create('reimbursements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal');
            $table->string('kategori');
            $table->string('deskripsi')->nullable();
            $table->decimal('jumlah', 15, 2);
            $table->string('status');
            $table->date('tanggal_approval')->nullable();
            $table->unsignedBigInteger('approval_by')->nullable();
            $table->timestamps();

            $table->foreign(('user_id'))->references('id')->on('users');
            $table->foreign(('approval_by'))->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reimbursements');
    }
};
