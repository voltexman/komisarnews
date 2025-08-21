<?php

use App\Enums\HairColor;
use App\Enums\OrderStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->startingValue(10205);
            $table->enum('purpose', ['Оцінка', 'Продаж'])->default('Продаж');
            $table->string('name')->nullable();
            $table->string('city');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->enum('color', HairColor::all())->default(HairColor::BLOND->value);
            $table->integer('weight')->nullable();
            $table->integer('length');
            $table->integer('age')->nullable();
            $table->json('options')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', OrderStatus::all())->default(OrderStatus::NEW->value);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
