<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['nam', 'nữ']);
            $table->string('email');
            $table->text('address');
            $table->string('phone_number');
            $table->string('payment_method'); // Hình thức thanh toán
            $table->integer('product_quantity');
            $table->string('order_code')->unique(); // Mã đơn hàng tự random
            $table->timestamp('order_date')->useCurrent(); // Ngày tạo đơn hàng
            $table->enum('status', [
                'Đã nhận đơn',
                'Đang xử lý',
                'Đang vận chuyển',
                'Giao hàng thành công',
                'Đơn hàng bị hủy',
                'Giao hàng không thành công'
            ])->default('Đã nhận đơn');
            $table->decimal('total_price', 12, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};