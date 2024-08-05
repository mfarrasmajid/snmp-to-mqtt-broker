<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnmpPayloadLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snmp_payload_log', function (Blueprint $table) {
            $table->id();
            $table->string('from_host', 150)->nullable();
            $table->string('oid', 150)->nullable();
            $table->text('payload')->nullable();
            $table->integer('type')->nullable();
            $table->text('value')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snmp_payload_log');
    }
}
