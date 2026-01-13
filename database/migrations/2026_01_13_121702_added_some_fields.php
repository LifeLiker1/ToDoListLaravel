<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        // Проверяем, существует ли таблица
        if (!Schema::hasTable('tasks')) {
            Schema::create('tasks', function (Blueprint $table) {
                // Основные столбцы
                $table->id(); // bigint unsigned auto_increment primary key

                $table->string('title', 255);
                $table->text('description')->nullable();
                $table->tinyInteger('status')->default(0);

                // Timestamps (даты создания и обновления)
                $table->timestamps();

                // Soft deletes (для "мягкого" удаления - опционально)
                // $table->softDeletes();

                // Индексы для оптимизации
                $table->index('status');
                $table->index('created_at');
                $table->index(['status', 'created_at']);
            });

            // Комментарий к таблице
            DB::statement("ALTER TABLE tasks COMMENT = 'Таблица для хранения задач (To-Do List)'");
        } else {
            // Если таблица уже существует, добавляем недостающие столбцы
            Schema::table('tasks', function (Blueprint $table) {
                // Проверяем и добавляем каждый столбец если его нет

                if (!Schema::hasColumn('tasks', 'title')) {
                    $table->string('title', 255)->nullable()->after('id');
                }

                if (!Schema::hasColumn('tasks', 'description')) {
                    $table->text('description')->nullable()->after('title');
                }

                if (!Schema::hasColumn('tasks', 'status')) {
                    $table->tinyInteger('status')->default(0)->after('description');
                }

                if (!Schema::hasColumn('tasks', 'created_at')) {
                    $table->timestamp('created_at')->nullable()->after('status');
                }

                if (!Schema::hasColumn('tasks', 'updated_at')) {
                    $table->timestamp('updated_at')->nullable()->after('created_at');
                }
            });
        }
    }

    /**
     * Reverse the migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
