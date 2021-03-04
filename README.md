## アプリケーション名:『Tubuyaki Board』


## 概要
掲示板サイトです。投稿して情報が共有できるアプリです。
<br>開発期間は約1週間です。

## URL
http://tubuyaki-33500.herokuapp.com/ 


## テスト用アカウント
* email: syoya@g.com
* pw: 11111111


## 機能
ユーザー管理(新規登録、ログイン、ログアウト)、投稿、投稿編集、投稿削除、
<br>投稿詳細、ユーザー詳細、検索機能



## 使用技術
- フレームワーク：6.20.16
- フロント：HTML、CSS(bootstrap)
- サーバーサイド言語：PHP 7.3.24
- データベース：MySQL
- サーバー：Puma Nginx
- バージョン管理：GitHub
- 開発環境：localhost
- デプロイ環境：Heroku
- 使用マシン：Mac Big Sur(11.1)



## データベース設計

### テーブル設計
#### usersテーブル
| Column              | Type    | Options      |
| ------------------- | ------  | -----------  |
| name                | string  | null: false  |
| email               | string  | unique: true |
| encrypted_password  | string  | null: false  |

Association
- has_many :posts
- has_many :comments


#### postsテーブル
| Column               | Type        | Options            |
| -------------------- | ----------- | ------------------ |
| title                | string      | null: false        |
| content              | text        | null: false        |
| category_id          | integer     | null: false        |
| user                 | references  | foreign_key: true  |

Association
- belongs_to :user
- has_many :comennts
- has_many :categories



#### commentsテーブル
| Column   | Type        | Options            |
| -------- | ----------- | ------------------ |
| comment  | text        | null: false        |
| post     | references  | foreign_key: true  |
| user     | references  | foreign_key: true  |

Association
- belongs_to :user
- belongs_to :post

