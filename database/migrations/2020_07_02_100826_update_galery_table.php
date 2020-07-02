<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGaleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galeries', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable()->index()->after('id');
            $table->unsignedInteger('detail_id')->nullable()->index()->after('project_id')->comment('detail project id');
            $table->unsignedInteger('fasilitas_id')->nullable()->index()->after('detail_id');
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galeries', function($table) {
            $table->dropColumn('project_id');
            $table->dropColumn('detail_id');
            $table->dropColumn('fasilitas_id');
            $table->dropColumn('keterangan');
        });
    }
}
