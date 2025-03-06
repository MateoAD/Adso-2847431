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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'document')) {
                $table->bigInteger('document')->unique()->after('id');
            }
            if (!Schema::hasColumn('users', 'fullname')) {
                $table->string('fullname', 255)->after('document');
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender', 255)->nullable()->after('fullname');
            }
            if (!Schema::hasColumn('users', 'birthdate')) {
                $table->date('birthdate')->nullable()->after('gender');
            }
            if (!Schema::hasColumn('users', 'photo')) {
                $table->string('photo', 255)->nullable()->default('no-image.png')->after('birthdate');
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone', 255)->nullable()->after('photo');
            }
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email', 255)->unique()->after('phone');
            }
            if (!Schema::hasColumn('users', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'password')) {
                $table->string('password', 255)->after('email_verified_at');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role', 255)->default('client')->after('password');
            }
            if (!Schema::hasColumn('users', 'remember_token')) {
                $table->string('remember_token', 100)->nullable()->after('role');
            }
            if (!Schema::hasColumn('users', 'created_at')) {
                $table->timestamp('created_at')->nullable()->after('remember_token');
            }
            if (!Schema::hasColumn('users', 'updated_at')) {
                $table->timestamp('updated_at')->nullable()->after('created_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'document', 'fullname', 'gender', 'birthdate', 'photo',
                'phone', 'email', 'email_verified_at', 'password', 'role',
                'remember_token', 'created_at', 'updated_at'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
