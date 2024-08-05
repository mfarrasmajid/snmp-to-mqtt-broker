<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnmpHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snmp_host', function (Blueprint $table) {
            $table->id();
            $table->string('host', 255)->nullable();
            $table->string('community', 255)->nullable();
            $table->string('port', 255)->nullable();
            $table->string('retries', 255)->nullable();
            $table->string('timeout', 255)->nullable();
            $table->string('transport', 255)->nullable();
            $table->string('trapPort', 255)->nullable();
            $table->integer('version')->nullable();
            $table->string('userV3', 255)->nullable();
            $table->string('levelV3', 255)->nullable();
            $table->string('authProtocolV3', 255)->nullable();
            $table->string('authKeyV3', 255)->nullable();
            $table->string('privProtocolV3', 255)->nullable();
            $table->string('privKeyV3', 255)->nullable();
            $table->integer('status_active')->default(1);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snmp_host');
    }
}
