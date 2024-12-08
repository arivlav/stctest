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
        $tableName = 'books';
        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, static function (Blueprint $table) {
                $table->id('id_book');
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        $tableName = 'authors';
        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, static function (Blueprint $table) {
                $table->id('id_author');
                $table->string('name');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        $tableName = 'book_author';
        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, static function (Blueprint $table) {
                $table->id();
                $table->integer('book_id');
                $table->integer('author_id');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('book_author');
    }
};
