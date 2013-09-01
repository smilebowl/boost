# Boost ／ テンプレートプロジェクト

## 概要

TwitterBootstrapデザイン用のCakePHP初期プロジェクト。
BoostCakeをベースに設定。

## 設定

* .htaccessの設定  

		RewriteBase /labo/boottemp/

* Cookie名の変更 / core.php  

		Configure::write('Session.cookie', 'Boottemp');
		
		date_default_timezone_set('Asia/Tokyo');

* Roleの設定 / bootstrap.php  

		Configure::write('Users.roles', array(
		    'admin' => 'admin', 
		    'user' => 'user'
		));

* レイアウトの設定 / layouts/bootstrap.ctp
* データベースの設定 / database.php
* データベース作成  

		cake schema run create

* composer.pharでプラグイン導入

		composer.phar install
## 開発

* Templates/boottemp （テンプレート）
* Component/LoggingComponent.php （ロギング）
* Component/SessionExComponent.php （Session::SetFlash()の拡張）
* View/Helper/IconHelper.php （アイコンRendering）
* View/Elements/menu.ctp （メニューテンプレート）
* Users, Accesslogs, ItemsのController, Model, View


## 外部モジュール

ブラグイン
* Boostcake https://github.com/slywalker/cakephp-plugin-boost_cake
* Search https://github.com/CakeDC/search
* DebugKit https://github.com/cakephp/debug_kit
* SoftDeleteBehaivior https://github.com/CakeDC/utils


