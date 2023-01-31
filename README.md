# Happy Marche（ハッピーマルシェ）
2022年12月制作<br>
laravelの学習のために制作した簡易的なショッピングサイト。<br>
1からアプリを制作したのは初めてだった為、日々自分との闘いであったが、何とか作り終えることができた。<br>
もちろん「100%」とまではいかないが、大方満足のいく仕上がりになったと思う。<br>
これを機にlaravelでより高度なアプリケーションを作成できるよう日々学び精進していきたい。

## 概要
生産者から直接商品を購入できるECサイトを作成。<br>
一般ユーザ、販売者ユーザ、管理者ユーザの3種類に分け、それぞれでログイン可能。

## このプロジェクトのインストールと利用
```bash
git clone git@github.com:kazu0610/happymarche.git
cd happymarche

cp .env.example .env
```
#### 試験的にsqliteを使う場合
```bash
vi .env

---
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
---
↓ 上記部分を下記1行にする
---
DB_CONNECTION=sqlite
---
```

#### 依存パッケージのインストールとDBのマイグレーション
```bash
composer install
php artisan key:generate

npm install
npm run build

php artisan migrate --seed

php artisan serve
```

`http://localhost:8000` にアクセス

## 使い方
ログイン画面で下記のユーザでアクセス可能です
**【管理者ユーザ】**<br>
すべての機能を利用することが可能。<br>
レビューの編集・削除、日別・月別売上の確認、登録ユーザーの編集・削除等<br>
テストアカウント：<br>
・メールアドレス ⇒ admin@admin.com<br>
・パスワード ⇒ admin0000

**【販売者ユーザ】**<br>
一般会員の機能に加えて、<br>
生産地の登録(プロフィール)、商品の登録・編集・削除、各ユーザーの発注履歴の確認が可能<br>
テストアカウント：<br>
・メールアドレス ⇒ seller@seller.com<br>
・パスワード ⇒ seller0000

**【一般会員ユーザ】**<br>
商品の閲覧・購入、お気に入り登録・削除、レビューの閲覧・投稿、商品をカートへ追加・削除<br>
クレジットカード登録・更新、購入履歴の閲覧、プロフィール編集が可能。<br>
テストアカウント：<br>
・メールアドレス ⇒ ippan@gmail.com<br>
・パスワード ⇒ ippan0000


## 開発環境
XAMPP 3.3.0<br>
Laravel 9.4<br>
PHP 8.1.5<br>
phpmyadmin 5.1.3
