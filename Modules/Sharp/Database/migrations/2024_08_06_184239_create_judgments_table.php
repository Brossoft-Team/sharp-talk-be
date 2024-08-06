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
        Schema::create('judgments', function (Blueprint $table) {
            $table->id();
            $table->longText("content");
            $table->boolean("is_agree");
            $table->foreignIdFor(\Modules\Sharp\App\Models\Sharp::class);
            $table->foreignIdFor(\Modules\Sharp\App\Models\Judgment::class)->nullable();
            $table->foreignIdFor(\Modules\User\App\Models\User::class);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('judgments');
    }
};
