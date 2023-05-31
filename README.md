## OpenAI とTicketアプリ
ポイント
- ProfileページのUser AvatarはOpenAIを使用して画像を生成することができる。
- チケットを画像やPDFとして保管し管理するアプリ。
## Laravel開発環境
- docker compose から起動します
```
docker compose up -d --build
```

- mysqlコンテナにログインしてデータベースとユーザーを作成しておきます
```
mysql> create database laravel DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
mysql> grant all on laravel.* to dbman@'%' identified by 'password';
```

- appコンテナにログインしてLaravelをインストールします
```
docker compose exec app bash
composer create-project --prefer-dist "laravel/laravel=" .
```

- .envファイルを書き換えます
```
DB_CONNECTION=mysql
DB_HOST=app-mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=dbman
DB_PASSWORD=password
```
- ファイルのパーミッションで怒られる場合は、以下を実行します
```
cd /var/www
chmod -R 775 ./html
chgrp -R www-data ./html
chown -R 1000 ./html
(cd .. && chmod -R 775 ./html && chgrp -R www-data ./html && chown -R 1000 ./html && cd html)
```

- migrateを実行します
```
docker compose exec app bash
php artisan migrate
```

srcディレクトリで`npm run dev`

- ブラウザから、http://localhost:8080 でアクセスできることを確認します

## OpenAI
OPENAI_API_KEYは最初の3か月無料その後は有料となる。
https://platform.openai.com/account/usage     
  
こちらを使用
[openai-php/laravel](https://github.com/openai-php/laravel)
