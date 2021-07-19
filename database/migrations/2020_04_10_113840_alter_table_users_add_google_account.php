<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersAddGoogleAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_soc', 40)
                ->default('')
                ->index();
            $table->enum('type_auth', ['site', 'vk', 'fb', 'google'])
                ->default('site');
            $table->string('avatar', 150)
                ->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->dropColumn('id_soc');
            $table->dropColumn('type_auth');
            $table->dropColumn('avatar');
        });
    }
}
