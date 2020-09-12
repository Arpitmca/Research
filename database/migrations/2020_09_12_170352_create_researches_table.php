<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("user_id");
            $table->string("title");
            $table->string("slug");
            $table->string("status");
            $table->string("description");
            $table->text("content");
            $table->text("tags");
            $table->string("subject");
            $table->string("image");
            $table->string("goal_amount");
            $table->text("remark")->nullable();
            $table->string("views")->default(0);
            $table->string("bank_account_number")->nullable();
            $table->string("bank_account_ifsc")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researches');
    }
}
