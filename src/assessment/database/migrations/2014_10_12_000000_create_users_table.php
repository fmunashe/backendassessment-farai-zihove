<?php

use App\Enums\UserTypeEnum;
use App\Models\ContractStatus;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable()->default(now());
            $table->string('password');
            $table->enum('user_type',[UserTypeEnum::SUPER_ADMIN,UserTypeEnum::ADMIN,UserTypeEnum::USER])->default(UserTypeEnum::USER)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
