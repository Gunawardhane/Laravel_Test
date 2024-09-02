<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompletedPercentageAndEstimatedFinishTimeToCars extends Migration
{
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->integer('completedPercentage')->default(0);
            $table->datetime('estimatedFinishTime')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('completedPercentage');
            $table->dropColumn('estimatedFinishTime');
        });
    }
}
