<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalExpensesToReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('reports', function (Blueprint $table) {
        $table->decimal('total_expenses', 10, 2)->default(0)->after('total_sales'); // Adjust the 'after' column as needed
    });
}

public function down()
{
    Schema::table('reports', function (Blueprint $table) {
        $table->dropColumn('total_expenses');
    });
}

}
