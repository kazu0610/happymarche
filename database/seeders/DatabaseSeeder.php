<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Overtrue\LaravelFavorite\Favorite;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Favorite::create([
            'user_id' => 2,
            'favoriteable_type' => 'App\Models\Product',
            'favoriteable_id' => 23,
        ]);

        \App\Models\Post::upsert([
            ['id' => 8, 'user_id' => 1, 'seller_name' => 'じゃがいもさん', 'title' => 'a', 'reviewScore' => '★★', 'product_name' => 'a', 'body' => 'aa'],
            ['id' => 10, 'user_id' => 1, 'seller_name' => 'じゃがいもさん', 'title' => 'a', 'reviewScore' => '★★', 'product_name' => 'a', 'body' => 'aa'],
            ['id' => 32, 'user_id' => 2, 'seller_name' => 'おじさん', 'title' => '最高でした', 'reviewScore' => '★★★★', 'product_name' => 'にんじん', 'body' => '本当に<br>\r\n最高\r\nでした。!!ああああ'],
            ['id' => 33, 'user_id' => 2, 'seller_name' => '野口さん', 'title' => 'すごくよかった！', 'reviewScore' => '★★★★★', 'product_name' => 'レタス', 'body' => '本当によかった！\r\nまた利用したいです。'],
            ['id' => 34, 'user_id' => 1, 'seller_name' => '松本さん', 'title' => 'ひと言でいうと「最高」', 'reviewScore' => '★★★★★', 'product_name' => 'キャベツ', 'body' => 'キャベツが美味し過ぎてびっくり。\r\nこんなにおいしいキャベツは食べたことが無い！'],
            ['id' => 35, 'user_id' => 1, 'seller_name' => 'てすと', 'title' => 'てすと', 'reviewScore' => '★★★', 'product_name' => 'てすと', 'body' => 'てすと'],
            ['id' => 36, 'user_id' => 1, 'seller_name' => 'てすと', 'title' => 'てすと', 'reviewScore' => '★', 'product_name' => 'てすと', 'body' => 'てすと'],
            ['id' => 37, 'user_id' => 1, 'seller_name' => 'てすと', 'title' => 'てすと', 'reviewScore' => '★★★', 'product_name' => 'てすと', 'body' => 'てすと'],
            ['id' => 38, 'user_id' => 1, 'seller_name' => 'てすと', 'title' => 'てすと', 'reviewScore' => '★★★★', 'product_name' => 'てすと', 'body' => 'てすと'],
            ['id' => 39, 'user_id' => 1, 'seller_name' => 'てすと', 'title' => 'てすと', 'reviewScore' => '★★★', 'product_name' => 'てすと', 'body' => 'てすと'],
            ['id' => 40, 'user_id' => 1, 'seller_name' => 'てすと', 'title' => 'てすと', 'reviewScore' => '★★★', 'product_name' => 'てすと', 'body' => 'てすと'],
            ['id' => 41, 'user_id' => 1, 'seller_name' => '販売者A', 'title' => '本当においしかったです！', 'reviewScore' => '★★★★★', 'product_name' => 'とうもろこし', 'body' => '本当においしかったです！\r\nまた利用させてください。'],
            ['id' => 42, 'user_id' => 9, 'seller_name' => '農家A', 'title' => 'すごく美味しかったです！', 'reviewScore' => '★★★★★', 'product_name' => 'てすと', 'body' => 'ぜひまた利用したいです。\r\nありがとうございました。'],
            ['id' => 43, 'user_id' => 10, 'seller_name' => 'てすと', 'title' => 'てすと', 'reviewScore' => '★★★★★', 'product_name' => 'てすと', 'body' => 'てすと'],
        ], ['id'], ['user_id', 'seller_name', 'title', 'reviewScore', 'product_name', 'body']);

        \App\Models\Product::upsert([
            ['id' => 12, 'user_id' => 2, 'product_name' => 'なすび', 'detail' => '美味しいなすびです。', 'product_image' => '20221210_112723_nasubi.jpg', 'price' => 10, 'stock' => 5],
            ['id' => 14, 'user_id' => 2, 'product_name' => '熟成トマト', 'detail' => '高濃度リコピン配合の気候環境の優れたところで栽培されたトマトです！', 'product_image' => '20221210_112708_tomato.jpg', 'price' => 99, 'stock' => 5],
            ['id' => 17, 'user_id' => 2, 'product_name' => '甘くておいしいミカン', 'detail' => 'とれたての美味しいミカンです', 'product_image' => NULL, 'price' => 199, 'stock' => 5],
            ['id' => 18, 'user_id' => 2, 'product_name' => 'とにかくおいしいレタスです', 'detail' => '規格外のレタスです。味はすごく美味しい！', 'product_image' => '20221210_105943_letasu.jpg', 'price' => 99, 'stock' => 5],
            ['id' => 19, 'user_id' => 2, 'product_name' => 'ほくほくのじゃがいも', 'detail' => 'かたちは少し悪いですが、美味しいじゃがいもです。', 'product_image' => '20221206_222755_potato.jpg', 'price' => 120, 'stock' => 5],
            ['id' => 20, 'user_id' => 2, 'product_name' => '大きなブロッコリー', 'detail' => '規格外のブロッコリーです。超新鮮！', 'product_image' => '20221206_223038_brokkory.jpg', 'price' => 150, 'stock' => 5],
            ['id' => 23, 'user_id' => 2, 'product_name' => '最高のとうもろこし', 'detail' => '残念ながら市場には出せなくなったものの\r\n胸を張って「おいしい」と断言できる品物です。\r\nぜひお召し上がりください。', 'product_image' => '20221212_224737_corn.jpg', 'price' => 199, 'stock' => 5]
        ],['id'], ['user_id', 'product_name', 'detail', 'product_image', 'price', 'stock']);

        \App\Models\ShoppingCart::upsert([
            ['identifier' => '1', 'instance' => '8', 'content' => 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"2a3b6819d3087e586dfcd804f8b9e1ed\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"2a3b6819d3087e586dfcd804f8b9e1ed\";s:2:\"id\";s:2:\"20\";s:3:\"qty\";i:9;s:4:\"name\";s:27:\"大きなブロッコリー\";s:5:\"price\";d:150;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:28:\"20221206_223038_brokkory.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"8\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',
             'number' => 1,  'buy_flag' => 1, 'code' => 'lud5y9thbk', 'price_total' => 1350, 'qty' => 9],
            ['identifier' => '2', 'instance' => '8', 'content' => 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:199;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"8\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',
             'number' => 2,  'buy_flag' => 1, 'code' => '4ptz3ui86r', 'price_total' => 199, 'qty' => 1],
            ['identifier' => '3', 'instance' => '8', 'content' => 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"2a3b6819d3087e586dfcd804f8b9e1ed\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"2a3b6819d3087e586dfcd804f8b9e1ed\";s:2:\"id\";s:2:\"20\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:27:\"大きなブロッコリー\";s:5:\"price\";d:150;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:28:\"20221206_223038_brokkory.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"8\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',
             'number' => 3,  'buy_flag' => 1, 'code' => 'yi5klvo2ph', 'price_total' => 150, 'qty' => 1],
            ['identifier' => '4', 'instance' => '2', 'content' => 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:199;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"2\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',
             'number' => 1,  'buy_flag' => 1, 'code' => '0qi8br72d6', 'price_total' => 199, 'qty' => 1],
            ['identifier' => '5', 'instance' => '2', 'content' => 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"2\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:199;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"2\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',
             'number' => 2,  'buy_flag' => 1, 'code' => '795m0njol2', 'price_total' => 398, 'qty' => 2],
            ['identifier' => '6', 'instance' => '9', 'content' => 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"3\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:199;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:1:\"9\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',
             'number' => 1,  'buy_flag' => 1, 'code' => 'jkxhsc7bf8', 'price_total' => 597, 'qty' => 3],
            ['identifier' => '7', 'instance' => '10', 'content' => 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":11:{s:5:\"rowId\";s:32:\"56e2d58c711d86d12f51eff9aeb743c7\";s:2:\"id\";s:2:\"23\";s:3:\"qty\";s:1:\"3\";s:4:\"name\";s:27:\"最高のとうもろこし\";s:5:\"price\";d:299;s:6:\"weight\";d:0;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:24:\"20221212_224737_corn.jpg\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"taxRate\";i:10;s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:46:\"\0Gloudemans\\Shoppingcart\\CartItem\0discountRate\";i:0;s:8:\"instance\";s:2:\"10\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}',
             'number' => 1,  'buy_flag' => 1, 'code' => 'h7kw03f1s8', 'price_total' => 897, 'qty' => 3]
        ],['identifier', 'instance'], ['content', 'number', 'buy_flag', 'code', 'price_total', 'qty']);

        \App\Models\User::upsert([
            ['id' => 1, 'name' => '一般会員！', 'email' => 'test@test.com', 'email_verified_at' => NULL, 'password' => '$2y$10$nS7NN6OjHLAouTtHcBXJFOAYfc7L5VciDk3vCaxvZgg0rZycjgbgq',
             'remember_token' => NULL, 'image' => '20221225_125312_142135.jpg', 'tel' => NULL, 'postcode' => NULL,
             'address' => NULL, 'stripe_id' => NULL, 'pm_type' => NULL, 'pm_last_four' => NULL,
             'trial_ends_at' => NULL, 'role' => 1, 'area' => NULL, 'token' => 'cus_a28d70a8cffbce9297cb59966932'],
            ['id' => 2, 'name' => '管理者', 'email' => 'admin@admin.com', 'email_verified_at' => NULL, 'password' => '$2y$10$6H0ZVubxzRNoCvazEUSAB.T8lEkMG4NYKwZdB/Nlt2yHp5j9rQGXO',
             'remember_token' => 'OCImVDDyVuQwSrWs2JGFMs9HJB1u2wtwRakCVIAgXaMh2ljxcUzKYaQajC19', 'image' => '20221128_220125_inosisi.png', 'tel' => '09000000000', 'postcode' => 6100000,
             'address' => '京都府京都市大枝東新林町', 'stripe_id' => NULL, 'pm_type' => NULL, 'pm_last_four' => NULL,
             'trial_ends_at' => NULL, 'role' => 100, 'area' => '滋賀県草津市', 'token' => 'cus_a82d2ab07924b0f7745d2c950977'],
            ['id' => 3, 'name' => '販売者', 'email' => 'seller@seller.com', 'email_verified_at' => NULL, 'password' => '$2y$10$y7jr5ZsYKYyHXoLHj5IoM.tM50TMZsxX7Xjbtm6l6VpSIYViHX1xS',
             'remember_token' => NULL, 'image' => '20221212_224958_read.jpg', 'tel' => NULL, 'postcode' => NULL,
             'address' => NULL, 'stripe_id' => NULL, 'pm_type' => NULL, 'pm_last_four' => NULL,
             'trial_ends_at' => NULL, 'role' => 50, 'area' => NULL, 'token' => ''],
            ['id' => 6, 'name' => 'てすと', 'email' => 'kazu0610.3jsb@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$oxRZ8j85n.vASmpZqVFVledx7sZ/0Tzdtk6iXQ7CVlOs5lt0upUd2',
             'remember_token' => 'eenZkb2jOteO1vjMyI6o6AkdhSfqj9KdHfTQW15nIdD3JSijFuJL7ggDrcF8', 'image' => NULL, 'tel' => NULL, 'postcode' => NULL,
             'address' => NULL, 'stripe_id' => NULL, 'pm_type' => NULL, 'pm_last_four' => NULL,
             'trial_ends_at' => NULL, 'role' => 1, 'area' => NULL, 'token' => ''],
            ['id' => 8, 'name' => '一般会員A', 'email' => 'ippan@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$.ozNteBjQf6s1Js3eNF5L..feFZJrCCKr.tRUxzD9AzI4lRu21ZHm',
             'remember_token' => NULL, 'image' => '20221225_144238_ゆるい笑顔の男の子.jpg', 'tel' => NULL, 'postcode' => NULL,
             'address' => NULL, 'stripe_id' => NULL, 'pm_type' => NULL, 'pm_last_four' => NULL,
             'trial_ends_at' => NULL, 'role' => 1, 'area' => NULL, 'token' => 'cus_0c170e47fd7c63e0fa2e22e8a1ce'],
            ['id' => 9, 'name' => '一般会員キャプチャ用', 'email' => 'general@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$8EC28fXTFyV1wJ9M3UIml.XJhP3FN432RSi8SJnJUdsdUEYzvfnky',
             'remember_token' => NULL, 'image' => '20221226_214503_ペンギン.jpg', 'tel' => NULL, 'postcode' => NULL,
             'address' => NULL, 'stripe_id' => NULL, 'pm_type' => NULL, 'pm_last_four' => NULL,
             'trial_ends_at' => NULL, 'role' => 1, 'area' => NULL, 'token' => 'cus_0c2c34fb8256eb6d01fd96bf5e2d'],
            ['id' => 10, 'name' => '一般会員動画用', 'email' => 'general1@gmail.com', 'email_verified_at' => NULL, 'password' => '$2y$10$xiify5kv9kuiLE2UCW33HOQtC7d7qid0UQ0WOvd85h9rTccNsBqci',
             'remember_token' => NULL, 'image' => '20221226_220225_パンダ.jpg', 'tel' => NULL, 'postcode' => NULL,
             'address' => NULL, 'stripe_id' => NULL, 'pm_type' => NULL, 'pm_last_four' => NULL,
             'trial_ends_at' => NULL, 'role' => 1, 'area' => NULL, 'token' => 'cus_ca59d7714a9e04db419199c21b05']
        ],['id'], ['name', 'email', 'email_verified_at', 'password', 'remember_token', 'image', 'tel', 'postcode', 'address', 'stripe_id', 'pm_type', 'pm_last_four', 'trial_ends_at', 'role', 'area', 'token']);
    }
}
