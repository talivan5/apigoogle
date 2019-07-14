<?php

use Illuminate\Database\Seeder;


class ShopTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Shop::class,200)->create();
    }
}
