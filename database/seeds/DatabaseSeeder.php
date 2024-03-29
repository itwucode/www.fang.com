<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 生成后台用户数据
        $this->call(AdminSeeder::class);

        // 分类信息
        $this->call(CateSeeder::class);

        // 文章
        $this->call(ArticleSeeder::class);
    }
}
