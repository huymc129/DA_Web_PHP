<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSlugColumnInMoviesTable extends Migration
{
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            // Đảm bảo rằng trường 'slug' không thể null
            $table->string('slug')->nullable(false)->change();
        });
    }

    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            // Nếu muốn quay lại trạng thái trước đó, thay đổi slug thành nullable
            $table->string('slug')->nullable()->change();
        });
    }
}
