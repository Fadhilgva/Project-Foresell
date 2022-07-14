 <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateProductsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id');
                $table->foreignId('store_id');
                $table->string('image')->nullable();
                $table->string('name');
                $table->string('slug')->unique();
                $table->unsignedInteger('price');
                $table->unsignedInteger('stock');
                $table->unsignedInteger('sold')->default(0);
                $table->unsignedInteger('discount')->default(0);
                $table->text('desc');
                $table->timestamp('published_at')->nullable();
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
            Schema::dropIfExists('products');
        }
    }
