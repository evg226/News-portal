<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\News;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('author', 255)
                ->nullable();
            $table->string('description')
                ->nullable();
            $table->string('image')
                ->nullable();
            $table->text('content');
            $table->enum('status', [
                News::DRAFT,
                News::ACTIVE,
                News::BLOCKED
            ])
                ->default(News::DRAFT);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
