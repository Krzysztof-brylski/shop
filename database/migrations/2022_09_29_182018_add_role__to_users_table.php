<?php

use http\Client\Curl\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Emums\UserRoles;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role',UserRoles::ROLES)->default(UserRoles::USER)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
    private function userGateRole( $name, $role){
        Gate::define($name, function (User $user) use($role){
            return $user->role == $role;
        });
    }
};
