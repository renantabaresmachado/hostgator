<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('temperament');
            $table->string('life_span');
            $table->string('alt_names')->nullable();    
            $table->string('wikipedia_url')->nullable();
            $table->string('cfa_url')->nullable();//json response
            $table->string('vetstreet_url')->nullable();//json response
            $table->string('vcahospitals_url')->nullable();//json response
            $table->string('country_codes');//json response
            $table->longText('description');//json response see length
            $table->integer('indoor');//json response
            $table->integer('lap')->nullable();//json response
            $table->string('origin');
            $table->string('weight_imperial')->nullable();
            $table->integer('experimental');
            $table->integer('hairless');
            $table->integer('natural');
            $table->integer('rare');
            $table->integer('rex');
            $table->integer('suppressed_tail');
            $table->integer('short_legs');
            $table->integer('hypoallergenic');
            $table->integer('adaptability');    
            $table->integer('affection_level');
            $table->string('country_code');
            $table->integer('child_friendly');
            $table->integer('dog_friendly');
            $table->integer('energy_level');
            $table->integer('grooming');
            $table->integer('health_issues');
            $table->integer('intelligence');
            $table->integer('shedding_level');
            $table->integer('social_needs');
            $table->integer('stranger_friendly');
            $table->integer('vocalisation');
            $table->timestamps();
            $table->integer('weight_id')->unsigned();
            $table->foreign('weight_id')->references('id')->on('weights');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breeds');
    }
}
