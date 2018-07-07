<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FightsAddAttackerDefender extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fights', function (Blueprint $table) {
            $table->unsignedInteger('attacker');
            $table->foreign('attacker')->references('id')->on('robots');
            $table->unsignedInteger('defender');
            $table->foreign('defender')->references('id')->on('robots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fights', function (Blueprint $table) {
            $table->dropForeign('fights_attacker_foreign');
            $table->dropColumn('attacker');
            $table->dropForeign('fights_defender_foreign');
            $table->dropColumn('defender');
        });
    }
}
