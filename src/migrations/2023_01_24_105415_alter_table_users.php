<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('alt_email')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->string('profile_image')->nullable()->default(null);
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
            $table->dropColumn('alt_email');
            $table->dropColumn('phone');
            $table->dropColumn('status');
            $table->dropColumn('profile_image');
        });
    }
};
