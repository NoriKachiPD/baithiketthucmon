<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->text('note')->nullable()->change();  // Cập nhật trường 'note' để nó có thể chứa giá trị null
        });
    }
    
    public function down()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->text('note')->nullable(false)->change();  // Khôi phục lại trường 'note' không nullable nếu cần
        });
    }
};
