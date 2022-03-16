# 食材管理アプリ

本アプリは、「購入した食材を管理するためのアプリ」です。  
ユーザーは買い物に行く際に買う食材を記入し、買い忘れを防止します。
購入後食材の金額、賞味期限、消費期限を記入して保存します。
その日買った食材の合計金額を表示し、簡易的な家計簿になります。
賞味期限、消費期限を登録した食材は期限が近い順に一覧で表示するようにし、「いつの間にか切れていた」ということが無いようにしました。  
また、開発途中ではありますが、登録した情報を基に、ラインへ自動送信を毎朝AM8:00に行います。

# 作成した背景/目的

私は買い物に行く際にあらかじめ決めていても忘れてしまうことがありました。そこで紙や、スマホのメモアプリに記述し、買い忘れ防止を行っていましたが、使用しているアプリは他のこともメモするためすぐに埋もれてしまいます。過去に何買ったか探すのが大変で家にあるのに同じものを購入してしまうということが多々発生していました。  
また、購入した商品の賞味期限が「いつの間にか切れていた」ということも頻繁にありました。  
そこで、webページ上で買う商品のリストを一括で管理でき、過去に買った商品が簡単に見られ、賞味期限の管理ができるアプリを作成しました。

# 開発環境

#### OS  
Windows 11

#### フロントエンド  
* HTML/CSS
* Bootstrap v4.6.1

#### バックエンド
* PHP v8.0.14
* Laravel v6.20.44

#### データベース
* MairaDB

#### インフラ
* AWS (EC2)

#### デプロイ
Heroku (https://salty-peak-75420.herokuapp.com/)

##### テストアカウント

テストアカウント：　shoya  
ログインEmail：　shoya1023@outlook.jp  
ログインパスワード：　shoya1023  

# テーブル定義

### usersテーブル

|  カラム名  |  データ型  | 詳細  | 
| ---- | ---- | ---- |
|  id  |  bigint(20) unsigned  | ID  |
|  name  |  varchar(255)  | ユーザー名  |
|  email  | varchar(255)   | メールアドレス  |
|  passward  | varchar(255)   | パスワード  |
| line_id   | varchar(255)   | LINEのID   |
| remember_token   | varchar(100)   | ログイン状態の保持   |
| created_at   | timestamp   | データ作成時間   |
| updated_at   | timestamp   | データ更新時間   |

### shopsテーブル

|  カラム名  |  データ型  | 詳細  | 
| ---- | ---- | ---- |
|  id  | bigint(20) unsigned   | ID  |
|  name  | varchar(50)   | 買い物リストの題名  |
| created_at   | timestamp   | データ作成時間  |
| updated_at   | timestamp   | データ更新時間  |
| user_id   | bigint(20) unsigned   | データ削除時間  |

### shop_foodsテーブル

|  カラム名  |  データ型  | 詳細  | 
| ---- | ---- | ---- |
|  id  | bigint(20) unsigned   | ID  |
|  name  | varchar(50)   | 食材の名前  |
|  cost  | varchar(50)   | 値段  |
|  shoumi_date  | date   | 賞味期限  |
|  shouhi_date  | date   | 消費期限  |
| user_id   | bigint(20) unsigned   | usersテーブルとの連携用  |
| shop_id   | int(11)   | shopsテーブルとの連携用ID  |
| created_at   | int(11)   | データ作成時間  |
| updated_at   | timestamp   | データ更新時間  |
| deleted_at   | timestamp   | データ削除時間  |

