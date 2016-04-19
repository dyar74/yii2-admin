<?php
use yii\db\Migration;

class m160419_124214_all_tables extends Migration
{

    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('auth_assignment', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%auth_assignment}}', [
                    'item_name' => 'VARCHAR(64) NOT NULL',
                    0 => 'PRIMARY KEY (`item_name`)',
                    'user_id' => 'VARCHAR(64) NOT NULL',
                    1 => 'KEY (`user_id`)',
                    'created_at' => 'INT(11) NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('auth_item', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%auth_item}}', [
                    'name' => 'VARCHAR(64) NOT NULL',
                    0 => 'PRIMARY KEY (`name`)',
                    'type' => 'INT(11) NOT NULL',
                    'description' => 'TEXT NULL',
                    'rule_name' => 'VARCHAR(64) NULL',
                    'data' => 'TEXT NULL',
                    'created_at' => 'INT(11) NULL',
                    'updated_at' => 'INT(11) NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('auth_item_child', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%auth_item_child}}', [
                    'parent' => 'VARCHAR(64) NOT NULL',
                    0 => 'PRIMARY KEY (`parent`)',
                    'child' => 'VARCHAR(64) NOT NULL',
                    1 => 'KEY (`child`)',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('auth_rule', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%auth_rule}}', [
                    'name' => 'VARCHAR(64) NOT NULL',
                    0 => 'PRIMARY KEY (`name`)',
                    'data' => 'TEXT NULL',
                    'created_at' => 'INT(11) NULL',
                    'updated_at' => 'INT(11) NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('block', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%block}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NULL',
                    'code' => 'VARCHAR(255) NOT NULL',
                    'value' => 'TEXT NULL',
                    'created_at' => 'INT(11) NOT NULL',
                    'updated_at' => 'INT(11) NOT NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('gallery', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%gallery}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'code' => 'VARCHAR(255) NOT NULL',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'description' => 'TEXT NULL',
                    'sort' => 'INT(11) NULL DEFAULT \'500\'',
                    'created_at' => 'INT(11) NOT NULL',
                    'updated_at' => 'INT(11) NOT NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('gallery_image', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%gallery_image}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'gallery_id' => 'INT(11) NOT NULL',
                    'file' => 'VARCHAR(255) NULL',
                    'alt' => 'VARCHAR(255) NULL',
                    'sort' => 'INT(11) NULL DEFAULT \'500\'',
                    'created_at' => 'INT(11) NOT NULL',
                    'updated_at' => 'INT(11) NOT NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('language', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%language}}', [
                    'language_id' => 'VARCHAR(5) NOT NULL',
                    0 => 'PRIMARY KEY (`language_id`)',
                    'language' => 'VARCHAR(3) NOT NULL',
                    'country' => 'VARCHAR(3) NOT NULL',
                    'name' => 'VARCHAR(32) NOT NULL',
                    'name_ascii' => 'VARCHAR(32) NOT NULL',
                    'status' => 'SMALLINT(6) NOT NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('language_source', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%language_source}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'category' => 'VARCHAR(32) NULL',
                    'message' => 'TEXT NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('language_translate', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%language_translate}}', [
                    'id' => 'INT(11) NOT NULL',
                    0 => 'PRIMARY KEY (`id`)',
                    'language' => 'VARCHAR(5) NOT NULL',
                    1 => 'KEY (`language`)',
                    'translation' => 'TEXT NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('menu', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%menu}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'tree' => 'INT(11) NULL',
                    'lft' => 'INT(11) NOT NULL',
                    'rgt' => 'INT(11) NOT NULL',
                    'depth' => 'INT(11) NOT NULL',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'url' => 'VARCHAR(255) NULL',
                    'code' => 'VARCHAR(55) NOT NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('migration', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%migration}}', [
                    'version' => 'VARCHAR(180) NOT NULL',
                    0 => 'PRIMARY KEY (`version`)',
                    'apply_time' => 'INT(11) NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('page', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%page}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(255) NOT NULL',
                    'alias' => 'VARCHAR(255) NOT NULL',
                    'published' => 'TINYINT(1) NULL DEFAULT \'1\'',
                    'content' => 'TEXT NULL',
                    'title_browser' => 'VARCHAR(255) NULL',
                    'meta_keywords' => 'VARCHAR(200) NULL',
                    'meta_description' => 'VARCHAR(160) NULL',
                    'created_at' => 'TIMESTAMP NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
                    'updated_at' => 'TIMESTAMP NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('profile', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%profile}}', [
                    'user_id' => 'INT(11) NOT NULL',
                    0 => 'PRIMARY KEY (`user_id`)',
                    'name' => 'VARCHAR(255) NULL',
                    'public_email' => 'VARCHAR(255) NULL',
                    'gravatar_email' => 'VARCHAR(255) NULL',
                    'gravatar_id' => 'VARCHAR(32) NULL',
                    'location' => 'VARCHAR(255) NULL',
                    'website' => 'VARCHAR(255) NULL',
                    'bio' => 'TEXT NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('setting', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%setting}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'parent_id' => 'INT(11) NOT NULL DEFAULT \'0\'',
                    'code' => 'VARCHAR(32) NOT NULL',
                    'type' => 'VARCHAR(32) NOT NULL',
                    'store_range' => 'VARCHAR(255) NULL',
                    'store_dir' => 'VARCHAR(255) NULL',
                    'value' => 'TEXT NULL',
                    'sort_order' => 'INT(11) NOT NULL DEFAULT \'50\'',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('social_account', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%social_account}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NULL',
                    'provider' => 'VARCHAR(255) NOT NULL',
                    'client_id' => 'VARCHAR(255) NOT NULL',
                    'data' => 'TEXT NULL',
                    'code' => 'VARCHAR(32) NULL',
                    'created_at' => 'INT(11) NULL',
                    'email' => 'VARCHAR(255) NULL',
                    'username' => 'VARCHAR(255) NULL',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('token', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%token}}', [
                    'user_id' => 'INT(11) NOT NULL',
                    0 => 'PRIMARY KEY (`user_id`)',
                    'code' => 'VARCHAR(32) NOT NULL',
                    1 => 'KEY (`code`)',
                    'created_at' => 'INT(11) NOT NULL',
                    'type' => 'SMALLINT(6) NOT NULL',
                    3 => 'KEY (`type`)',
                    ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('user', $tables)) {
            if ($dbType == "mysql") {
                $this->createTable('{{%user}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'username' => 'VARCHAR(255) NOT NULL',
                    'email' => 'VARCHAR(255) NOT NULL',
                    'password_hash' => 'VARCHAR(60) NOT NULL',
                    'auth_key' => 'VARCHAR(32) NOT NULL',
                    'confirmed_at' => 'INT(11) NULL',
                    'unconfirmed_email' => 'VARCHAR(255) NULL',
                    'blocked_at' => 'INT(11) NULL',
                    'registration_ip' => 'VARCHAR(45) NULL',
                    'created_at' => 'INT(11) NOT NULL',
                    'updated_at' => 'INT(11) NOT NULL',
                    'flags' => 'INT(11) NOT NULL DEFAULT \'0\'',
                    ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_rule_name_7383_00', 'auth_item', 'rule_name', 0);
        $this->createIndex('idx_type_7383_01', 'auth_item', 'type', 0);
        $this->createIndex('idx_child_749_02', 'auth_item_child', 'child', 0);
        $this->createIndex('idx_UNIQUE_code_0783_03', 'block', 'code', 1);
        $this->createIndex('idx_name_0784_04', 'block', 'name', 0);
        $this->createIndex('idx_UNIQUE_code_1494_05', 'gallery', 'code', 1);
        $this->createIndex('idx_name_1494_06', 'gallery', 'name', 0);
        $this->createIndex('idx_sort_1494_07', 'gallery', 'sort', 0);
        $this->createIndex('idx_gallery_id_1542_08', 'gallery_image', 'gallery_id', 0);
        $this->createIndex('idx_sort_1542_09', 'gallery_image', 'sort', 0);
        $this->createIndex('idx_language_2072_10', 'language_translate', 'language', 0);
        $this->createIndex('idx_UNIQUE_alias_3815_11', 'page', 'alias', 1);
        $this->createIndex('idx_alias_3815_12', 'page', 'alias', 0);
        $this->createIndex('idx_parent_id_5206_13', 'setting', 'parent_id', 0);
        $this->createIndex('idx_code_5207_14', 'setting', 'code', 0);
        $this->createIndex('idx_sort_order_5207_15', 'setting', 'sort_order', 0);
        $this->createIndex('idx_UNIQUE_provider_6386_16', 'social_account', 'provider', 1);
        $this->createIndex('idx_UNIQUE_code_6386_17', 'social_account', 'code', 1);
        $this->createIndex('idx_user_id_6386_18', 'social_account', 'user_id', 0);
        $this->createIndex('idx_UNIQUE_user_id_6468_19', 'token', 'user_id', 1);
        $this->createIndex('idx_UNIQUE_email_65_20', 'user', 'email', 1);
        $this->createIndex('idx_UNIQUE_username_65_21', 'user', 'username', 1);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_auth_item_7246_00', '{{%auth_assignment}}', 'item_name', '{{%auth_item}}', 'name', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_auth_rule_7375_01', '{{%auth_item}}', 'rule_name', '{{%auth_rule}}', 'name', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_auth_item_7483_02', '{{%auth_item_child}}', 'parent', '{{%auth_item}}', 'name', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_auth_item_7483_03', '{{%auth_item_child}}', 'child', '{{%auth_item}}', 'name', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_gallery_1537_04', '{{%gallery_image}}', 'gallery_id', '{{%gallery}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_language_2068_05', '{{%language_translate}}', 'language', '{{%language}}', 'language_id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_language_source_2068_06', '{{%language_translate}}', 'id', '{{%language_source}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_user_4512_07', '{{%profile}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_user_6382_08', '{{%social_account}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_user_6465_09', '{{%token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%auth_assignment}}', ['item_name' => 'admin', 'user_id' => '1', 'created_at' => '1459507147']);
//        $this->insert('{{%auth_assignment}}', ['item_name' => 'root', 'user_id' => '3', 'created_at' => '1459427212']);
        $this->insert('{{%auth_item}}', ['name' => 'admin', 'type' => '1', 'description' => 'Administrator', 'rule_name' => '', 'data' => '', 'created_at' => '1459321211', 'updated_at' => '1459507130']);
        $this->insert('{{%auth_item}}', ['name' => 'showGalleryModule', 'type' => '2', 'description' => 'Show gallery module in main-menu', 'rule_name' => '', 'data' => '', 'created_at' => '1459713634', 'updated_at' => '1459713634']);
        $this->insert('{{%auth_item}}', ['name' => 'showPagesModule', 'type' => '2', 'description' => 'Show pages module in main-menu', 'rule_name' => '', 'data' => '', 'created_at' => '1459713448', 'updated_at' => '1459713448']);
        $this->insert('{{%auth_item_child}}', ['parent' => 'admin', 'child' => 'showGalleryModule']);
        $this->insert('{{%block}}', ['id' => '1', 'name' => 'Phone', 'code' => 'phone', 'value' => '+38067 000 00 00', 'created_at' => '1459939157', 'updated_at' => '1459939157']);
        $this->insert('{{%block}}', ['id' => '3', 'name' => 'Church', 'code' => 'brand', 'value' => 'Church', 'created_at' => '1460110818', 'updated_at' => '1460115138']);
        $this->insert('{{%gallery}}', ['id' => '1', 'code' => 'main_slider', 'name' => 'Main Slider', 'description' => 'Main Slider', 'sort' => '500', 'created_at' => '1459716060', 'updated_at' => '1460138407']);
        $this->insert('{{%gallery_image}}', ['id' => '4', 'gallery_id' => '1', 'file' => 'img-1.jpg', 'alt' => '', 'sort' => '500', 'created_at' => '1460138346', 'updated_at' => '1460138346']);
        $this->insert('{{%gallery_image}}', ['id' => '5', 'gallery_id' => '1', 'file' => 'img-2.jpg', 'alt' => '', 'sort' => '500', 'created_at' => '1460138361', 'updated_at' => '1460138361']);
        $this->insert('{{%gallery_image}}', ['id' => '6', 'gallery_id' => '1', 'file' => 'img-3.jpg', 'alt' => '', 'sort' => '500', 'created_at' => '1460138378', 'updated_at' => '1460138378']);
        $this->insert('{{%language}}', ['language_id' => 'af-ZA', 'language' => 'af', 'country' => 'za', 'name' => 'Afrikaans', 'name_ascii' => 'Afrikaans', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ar-AR', 'language' => 'ar', 'country' => 'ar', 'name' => '‏العربية‏', 'name_ascii' => 'Arabic', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'az-AZ', 'language' => 'az', 'country' => 'az', 'name' => 'Azərbaycan dili', 'name_ascii' => 'Azerbaijani', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'be-BY', 'language' => 'be', 'country' => 'by', 'name' => 'Беларуская', 'name_ascii' => 'Belarusian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'bg-BG', 'language' => 'bg', 'country' => 'bg', 'name' => 'Български', 'name_ascii' => 'Bulgarian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'bn-IN', 'language' => 'bn', 'country' => 'in', 'name' => 'বাংলা', 'name_ascii' => 'Bengali', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'bs-BA', 'language' => 'bs', 'country' => 'ba', 'name' => 'Bosanski', 'name_ascii' => 'Bosnian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ca-ES', 'language' => 'ca', 'country' => 'es', 'name' => 'Català', 'name_ascii' => 'Catalan', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'cs-CZ', 'language' => 'cs', 'country' => 'cz', 'name' => 'Čeština', 'name_ascii' => 'Czech', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'cy-GB', 'language' => 'cy', 'country' => 'gb', 'name' => 'Cymraeg', 'name_ascii' => 'Welsh', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'da-DK', 'language' => 'da', 'country' => 'dk', 'name' => 'Dansk', 'name_ascii' => 'Danish', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'de-DE', 'language' => 'de', 'country' => 'de', 'name' => 'Deutsch', 'name_ascii' => 'German', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'el-GR', 'language' => 'el', 'country' => 'gr', 'name' => 'Ελληνικά', 'name_ascii' => 'Greek', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'en-GB', 'language' => 'en', 'country' => 'gb', 'name' => 'English (UK)', 'name_ascii' => 'English (UK)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'en-PI', 'language' => 'en', 'country' => 'pi', 'name' => 'English (Pirate)', 'name_ascii' => 'English (Pirate)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'en-UD', 'language' => 'en', 'country' => 'ud', 'name' => 'English (Upside Down)', 'name_ascii' => 'English (Upside Down)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'en-US', 'language' => 'en', 'country' => 'us', 'name' => 'English (US)', 'name_ascii' => 'English (US)', 'status' => '1']);
        $this->insert('{{%language}}', ['language_id' => 'eo-EO', 'language' => 'eo', 'country' => 'eo', 'name' => 'Esperanto', 'name_ascii' => 'Esperanto', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'es-ES', 'language' => 'es', 'country' => 'es', 'name' => 'Español (España)', 'name_ascii' => 'Spanish (Spain)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'es-LA', 'language' => 'es', 'country' => 'la', 'name' => 'Español', 'name_ascii' => 'Spanish', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'et-EE', 'language' => 'et', 'country' => 'ee', 'name' => 'Eesti', 'name_ascii' => 'Estonian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'eu-ES', 'language' => 'eu', 'country' => 'es', 'name' => 'Euskara', 'name_ascii' => 'Basque', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'fa-IR', 'language' => 'fa', 'country' => 'ir', 'name' => '‏فارسی‏', 'name_ascii' => 'Persian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'fb-LT', 'language' => 'fb', 'country' => 'lt', 'name' => 'Leet Speak', 'name_ascii' => 'Leet Speak', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'fi-FI', 'language' => 'fi', 'country' => 'fi', 'name' => 'Suomi', 'name_ascii' => 'Finnish', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'fo-FO', 'language' => 'fo', 'country' => 'fo', 'name' => 'Føroyskt', 'name_ascii' => 'Faroese', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'fr-CA', 'language' => 'fr', 'country' => 'ca', 'name' => 'Français (Canada)', 'name_ascii' => 'French (Canada)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'fr-FR', 'language' => 'fr', 'country' => 'fr', 'name' => 'Français (France)', 'name_ascii' => 'French (France)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'fy-NL', 'language' => 'fy', 'country' => 'nl', 'name' => 'Frysk', 'name_ascii' => 'Frisian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ga-IE', 'language' => 'ga', 'country' => 'ie', 'name' => 'Gaeilge', 'name_ascii' => 'Irish', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'gl-ES', 'language' => 'gl', 'country' => 'es', 'name' => 'Galego', 'name_ascii' => 'Galician', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'he-IL', 'language' => 'he', 'country' => 'il', 'name' => '‏עברית‏', 'name_ascii' => 'Hebrew', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'hi-IN', 'language' => 'hi', 'country' => 'in', 'name' => 'हिन्दी', 'name_ascii' => 'Hindi', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'hr-HR', 'language' => 'hr', 'country' => 'hr', 'name' => 'Hrvatski', 'name_ascii' => 'Croatian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'hu-HU', 'language' => 'hu', 'country' => 'hu', 'name' => 'Magyar', 'name_ascii' => 'Hungarian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'hy-AM', 'language' => 'hy', 'country' => 'am', 'name' => 'Հայերեն', 'name_ascii' => 'Armenian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'id-ID', 'language' => 'id', 'country' => 'id', 'name' => 'Bahasa Indonesia', 'name_ascii' => 'Indonesian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'is-IS', 'language' => 'is', 'country' => 'is', 'name' => 'Íslenska', 'name_ascii' => 'Icelandic', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'it-IT', 'language' => 'it', 'country' => 'it', 'name' => 'Italiano', 'name_ascii' => 'Italian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ja-JP', 'language' => 'ja', 'country' => 'jp', 'name' => '日本語', 'name_ascii' => 'Japanese', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ka-GE', 'language' => 'ka', 'country' => 'ge', 'name' => 'ქართული', 'name_ascii' => 'Georgian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'km-KH', 'language' => 'km', 'country' => 'kh', 'name' => 'ភាសាខ្មែរ', 'name_ascii' => 'Khmer', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ko-KR', 'language' => 'ko', 'country' => 'kr', 'name' => '한국어', 'name_ascii' => 'Korean', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ku-TR', 'language' => 'ku', 'country' => 'tr', 'name' => 'Kurdî', 'name_ascii' => 'Kurdish', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'la-VA', 'language' => 'la', 'country' => 'va', 'name' => 'lingua latina', 'name_ascii' => 'Latin', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'lt-LT', 'language' => 'lt', 'country' => 'lt', 'name' => 'Lietuvių', 'name_ascii' => 'Lithuanian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'lv-LV', 'language' => 'lv', 'country' => 'lv', 'name' => 'Latviešu', 'name_ascii' => 'Latvian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'mk-MK', 'language' => 'mk', 'country' => 'mk', 'name' => 'Македонски', 'name_ascii' => 'Macedonian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ml-IN', 'language' => 'ml', 'country' => 'in', 'name' => 'മലയാളം', 'name_ascii' => 'Malayalam', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ms-MY', 'language' => 'ms', 'country' => 'my', 'name' => 'Bahasa Melayu', 'name_ascii' => 'Malay', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'nb-NO', 'language' => 'nb', 'country' => 'no', 'name' => 'Norsk (bokmål)', 'name_ascii' => 'Norwegian (bokmal)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ne-NP', 'language' => 'ne', 'country' => 'np', 'name' => 'नेपाली', 'name_ascii' => 'Nepali', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'nl-NL', 'language' => 'nl', 'country' => 'nl', 'name' => 'Nederlands', 'name_ascii' => 'Dutch', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'nn-NO', 'language' => 'nn', 'country' => 'no', 'name' => 'Norsk (nynorsk)', 'name_ascii' => 'Norwegian (nynorsk)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'pa-IN', 'language' => 'pa', 'country' => 'in', 'name' => 'ਪੰਜਾਬੀ', 'name_ascii' => 'Punjabi', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'pl-PL', 'language' => 'pl', 'country' => 'pl', 'name' => 'Polski', 'name_ascii' => 'Polish', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ps-AF', 'language' => 'ps', 'country' => 'af', 'name' => '‏پښتو‏', 'name_ascii' => 'Pashto', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'pt-BR', 'language' => 'pt', 'country' => 'br', 'name' => 'Português (Brasil)', 'name_ascii' => 'Portuguese (Brazil)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'pt-PT', 'language' => 'pt', 'country' => 'pt', 'name' => 'Português (Portugal)', 'name_ascii' => 'Portuguese (Portugal)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ro-RO', 'language' => 'ro', 'country' => 'ro', 'name' => 'Română', 'name_ascii' => 'Romanian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ru-RU', 'language' => 'ru', 'country' => 'ru', 'name' => 'Русский', 'name_ascii' => 'Russian', 'status' => '1']);
        $this->insert('{{%language}}', ['language_id' => 'sk-SK', 'language' => 'sk', 'country' => 'sk', 'name' => 'Slovenčina', 'name_ascii' => 'Slovak', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'sl-SI', 'language' => 'sl', 'country' => 'si', 'name' => 'Slovenščina', 'name_ascii' => 'Slovenian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'sq-AL', 'language' => 'sq', 'country' => 'al', 'name' => 'Shqip', 'name_ascii' => 'Albanian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'sr-RS', 'language' => 'sr', 'country' => 'rs', 'name' => 'Српски', 'name_ascii' => 'Serbian', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'sv-SE', 'language' => 'sv', 'country' => 'se', 'name' => 'Svenska', 'name_ascii' => 'Swedish', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'sw-KE', 'language' => 'sw', 'country' => 'ke', 'name' => 'Kiswahili', 'name_ascii' => 'Swahili', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'ta-IN', 'language' => 'ta', 'country' => 'in', 'name' => 'தமிழ்', 'name_ascii' => 'Tamil', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'te-IN', 'language' => 'te', 'country' => 'in', 'name' => 'తెలుగు', 'name_ascii' => 'Telugu', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'th-TH', 'language' => 'th', 'country' => 'th', 'name' => 'ภาษาไทย', 'name_ascii' => 'Thai', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'tl-PH', 'language' => 'tl', 'country' => 'ph', 'name' => 'Filipino', 'name_ascii' => 'Filipino', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'tr-TR', 'language' => 'tr', 'country' => 'tr', 'name' => 'Türkçe', 'name_ascii' => 'Turkish', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'uk-UA', 'language' => 'uk', 'country' => 'ua', 'name' => 'Українська', 'name_ascii' => 'Ukrainian', 'status' => '1']);
        $this->insert('{{%language}}', ['language_id' => 'vi-VN', 'language' => 'vi', 'country' => 'vn', 'name' => 'Tiếng Việt', 'name_ascii' => 'Vietnamese', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'xx-XX', 'language' => 'xx', 'country' => 'xx', 'name' => 'Fejlesztő', 'name_ascii' => 'Developer', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'zh-CN', 'language' => 'zh', 'country' => 'cn', 'name' => '中文(简体)', 'name_ascii' => 'Simplified Chinese (China)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'zh-HK', 'language' => 'zh', 'country' => 'hk', 'name' => '中文(香港)', 'name_ascii' => 'Traditional Chinese (Hong Kong)', 'status' => '0']);
        $this->insert('{{%language}}', ['language_id' => 'zh-TW', 'language' => 'zh', 'country' => 'tw', 'name' => '中文(台灣)', 'name_ascii' => 'Traditional Chinese (Taiwan)', 'status' => '0']);
        $this->insert('{{%language_source}}', ['id' => '1', 'category' => 'app', 'message' => 'Online']);
        $this->insert('{{%language_source}}', ['id' => '2', 'category' => 'app', 'message' => 'Member since {date}']);
        $this->insert('{{%language_source}}', ['id' => '3', 'category' => 'app', 'message' => 'Profile']);
        $this->insert('{{%language_source}}', ['id' => '4', 'category' => 'app', 'message' => 'Sign Out']);
        $this->insert('{{%language_source}}', ['id' => '5', 'category' => 'app', 'message' => 'Home']);
        $this->insert('{{%language_source}}', ['id' => '6', 'category' => 'app', 'message' => 'Admin Zone']);
        $this->insert('{{%language_source}}', ['id' => '7', 'category' => 'app', 'message' => 'MAIN NAVIGATION']);
        $this->insert('{{%language_source}}', ['id' => '8', 'category' => 'app', 'message' => 'Users']);
        $this->insert('{{%language_source}}', ['id' => '9', 'category' => 'app', 'message' => 'User']);
        $this->insert('{{%language_source}}', ['id' => '10', 'category' => 'app', 'message' => 'Login']);
        $this->insert('{{%language_source}}', ['id' => '11', 'category' => 'app', 'message' => 'Logout']);
        $this->insert('{{%language_source}}', ['id' => '12', 'category' => 'app', 'message' => 'Go to site']);
        $this->insert('{{%language_source}}', ['id' => '13', 'category' => 'app', 'message' => 'Change user role']);
        $this->insert('{{%language_source}}', ['id' => '14', 'category' => 'language', 'message' => 'Language']);
        $this->insert('{{%language_source}}', ['id' => '15', 'category' => 'language', 'message' => 'List of languages']);
        $this->insert('{{%language_source}}', ['id' => '16', 'category' => 'language', 'message' => 'Create']);
        $this->insert('{{%language_source}}', ['id' => '17', 'category' => 'language', 'message' => 'Scan']);
        $this->insert('{{%language_source}}', ['id' => '18', 'category' => 'language', 'message' => 'Optimize']);
        $this->insert('{{%language_source}}', ['id' => '19', 'category' => 'language', 'message' => 'Toggle translate']);
        $this->insert('{{%language_source}}', ['id' => '20', 'category' => 'language', 'message' => 'Successfully imported {fileName}']);
        $this->insert('{{%language_source}}', ['id' => '21', 'category' => 'language', 'message' => '{type}: {new} new, {updated} updated']);
        $this->insert('{{%language_source}}', ['id' => '22', 'category' => 'language', 'message' => 'translations']);
        $this->insert('{{%language_source}}', ['id' => '23', 'category' => 'language', 'message' => 'Text not found in database! Please run project scan before translating!']);
        $this->insert('{{%language_source}}', ['id' => '24', 'category' => 'language', 'message' => 'Translation']);
        $this->insert('{{%language_source}}', ['id' => '25', 'category' => 'language', 'message' => 'Invalid model \"{model}\":']);
        $this->insert('{{%language_source}}', ['id' => '26', 'category' => 'language', 'message' => 'Status']);
        $this->insert('{{%language_source}}', ['id' => '27', 'category' => 'language', 'message' => 'Statistic']);
        $this->insert('{{%language_source}}', ['id' => '28', 'category' => 'language', 'message' => 'Translate']);
        $this->insert('{{%language_source}}', ['id' => '29', 'category' => 'language', 'message' => 'Update {modelClass}: ']);
        $this->insert('{{%language_source}}', ['id' => '30', 'category' => 'language', 'message' => 'Languages']);
        $this->insert('{{%language_source}}', ['id' => '31', 'category' => 'language', 'message' => 'Update']);
        $this->insert('{{%language_source}}', ['id' => '32', 'category' => 'language', 'message' => 'Import']);
        $this->insert('{{%language_source}}', ['id' => '33', 'category' => 'language', 'message' => 'Select all']);
        $this->insert('{{%language_source}}', ['id' => '34', 'category' => 'language', 'message' => 'Delete selected']);
        $this->insert('{{%language_source}}', ['id' => '35', 'category' => 'language', 'message' => 'Action']);
        $this->insert('{{%language_source}}', ['id' => '36', 'category' => 'language', 'message' => 'Delete']);
        $this->insert('{{%language_source}}', ['id' => '37', 'category' => 'language', 'message' => 'Optimise database']);
        $this->insert('{{%language_source}}', ['id' => '38', 'category' => 'language', 'message' => '{n, plural, =0{No entries} =1{One entry} other{# entries}} were removed!']);
        $this->insert('{{%language_source}}', ['id' => '39', 'category' => 'language', 'message' => 'Create {modelClass}']);
        $this->insert('{{%language_source}}', ['id' => '40', 'category' => 'language', 'message' => 'Scanning project']);
        $this->insert('{{%language_source}}', ['id' => '41', 'category' => 'language', 'message' => '{n, plural, =0{No new entries} =1{One new entry} other{# new entries}} were added!']);
        $this->insert('{{%language_source}}', ['id' => '42', 'category' => 'language', 'message' => '{n, plural, =0{No entries} =1{One entry} other{# entries}} remove!']);
        $this->insert('{{%language_source}}', ['id' => '43', 'category' => 'language', 'message' => 'Export']);
        $this->insert('{{%language_source}}', ['id' => '44', 'category' => 'language', 'message' => 'Source']);
        $this->insert('{{%language_source}}', ['id' => '45', 'category' => 'language', 'message' => 'Choosing the language of translation']);
        $this->insert('{{%language_source}}', ['id' => '46', 'category' => 'language', 'message' => 'Text to be translated']);
        $this->insert('{{%language_source}}', ['id' => '47', 'category' => 'language', 'message' => 'Translation into {language_id}']);
        $this->insert('{{%language_source}}', ['id' => '48', 'category' => 'language', 'message' => 'Original']);
        $this->insert('{{%language_source}}', ['id' => '49', 'category' => 'language', 'message' => 'Source language']);
        $this->insert('{{%language_source}}', ['id' => '50', 'category' => 'language', 'message' => 'Save']);
        $this->insert('{{%language_source}}', ['id' => '51', 'category' => 'language', 'message' => 'Are you sure you want to delete this item?']);
        $this->insert('{{%language_source}}', ['id' => '52', 'category' => 'language', 'message' => 'Translation status']);
        $this->insert('{{%language_source}}', ['id' => '53', 'category' => 'language', 'message' => 'Home']);
        $this->insert('{{%language_source}}', ['id' => '54', 'category' => 'language', 'message' => 'Im-/Export']);
        $this->insert('{{%language_source}}', ['id' => '55', 'category' => 'user', 'message' => 'Manage users']);
        $this->insert('{{%language_source}}', ['id' => '56', 'category' => 'user', 'message' => '(not set)']);
        $this->insert('{{%language_source}}', ['id' => '57', 'category' => 'user', 'message' => '{0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '58', 'category' => 'user', 'message' => 'Confirmation']);
        $this->insert('{{%language_source}}', ['id' => '59', 'category' => 'user', 'message' => 'Confirmed']);
        $this->insert('{{%language_source}}', ['id' => '60', 'category' => 'user', 'message' => 'Confirm']);
        $this->insert('{{%language_source}}', ['id' => '61', 'category' => 'user', 'message' => 'Are you sure you want to confirm this user?']);
        $this->insert('{{%language_source}}', ['id' => '62', 'category' => 'user', 'message' => 'Block status']);
        $this->insert('{{%language_source}}', ['id' => '63', 'category' => 'user', 'message' => 'Unblock']);
        $this->insert('{{%language_source}}', ['id' => '64', 'category' => 'user', 'message' => 'Are you sure you want to unblock this user?']);
        $this->insert('{{%language_source}}', ['id' => '65', 'category' => 'user', 'message' => 'Block']);
        $this->insert('{{%language_source}}', ['id' => '66', 'category' => 'user', 'message' => 'Are you sure you want to block this user?']);
        $this->insert('{{%language_source}}', ['id' => '67', 'category' => 'user', 'message' => 'Sign in']);
        $this->insert('{{%language_source}}', ['id' => '68', 'category' => 'user', 'message' => 'Logout']);
        $this->insert('{{%language_source}}', ['id' => '69', 'category' => 'user', 'message' => 'Your account has been blocked.']);
        $this->insert('{{%language_source}}', ['id' => '70', 'category' => 'user', 'message' => 'Recovery message sent']);
        $this->insert('{{%language_source}}', ['id' => '71', 'category' => 'user', 'message' => 'Recovery link is invalid or expired. Please try requesting a new one.']);
        $this->insert('{{%language_source}}', ['id' => '72', 'category' => 'user', 'message' => 'Invalid or expired link']);
        $this->insert('{{%language_source}}', ['id' => '73', 'category' => 'user', 'message' => 'Password has been changed']);
        $this->insert('{{%language_source}}', ['id' => '74', 'category' => 'user', 'message' => 'Your profile has been updated']);
        $this->insert('{{%language_source}}', ['id' => '75', 'category' => 'user', 'message' => 'Your account details have been updated']);
        $this->insert('{{%language_source}}', ['id' => '76', 'category' => 'user', 'message' => 'Your account has been created']);
        $this->insert('{{%language_source}}', ['id' => '77', 'category' => 'user', 'message' => 'Account confirmation']);
        $this->insert('{{%language_source}}', ['id' => '78', 'category' => 'user', 'message' => 'A new confirmation link has been sent']);
        $this->insert('{{%language_source}}', ['id' => '79', 'category' => 'user', 'message' => 'User has been created']);
        $this->insert('{{%language_source}}', ['id' => '80', 'category' => 'user', 'message' => 'Account details have been updated']);
        $this->insert('{{%language_source}}', ['id' => '81', 'category' => 'user', 'message' => 'Profile details have been updated']);
        $this->insert('{{%language_source}}', ['id' => '82', 'category' => 'user', 'message' => 'User has been confirmed']);
        $this->insert('{{%language_source}}', ['id' => '83', 'category' => 'user', 'message' => 'You can not remove your own account']);
        $this->insert('{{%language_source}}', ['id' => '84', 'category' => 'user', 'message' => 'User has been deleted']);
        $this->insert('{{%language_source}}', ['id' => '85', 'category' => 'user', 'message' => 'You can not block your own account']);
        $this->insert('{{%language_source}}', ['id' => '86', 'category' => 'user', 'message' => 'User has been unblocked']);
        $this->insert('{{%language_source}}', ['id' => '87', 'category' => 'user', 'message' => 'User has been blocked']);
        $this->insert('{{%language_source}}', ['id' => '88', 'category' => 'user', 'message' => 'Welcome to {0}']);
        $this->insert('{{%language_source}}', ['id' => '89', 'category' => 'user', 'message' => 'Confirm account on {0}']);
        $this->insert('{{%language_source}}', ['id' => '90', 'category' => 'user', 'message' => 'Confirm email change on {0}']);
        $this->insert('{{%language_source}}', ['id' => '91', 'category' => 'user', 'message' => 'Complete password reset on {0}']);
        $this->insert('{{%language_source}}', ['id' => '92', 'category' => 'user', 'message' => 'Current password is not valid']);
        $this->insert('{{%language_source}}', ['id' => '93', 'category' => 'user', 'message' => 'Email']);
        $this->insert('{{%language_source}}', ['id' => '94', 'category' => 'user', 'message' => 'Username']);
        $this->insert('{{%language_source}}', ['id' => '95', 'category' => 'user', 'message' => 'New password']);
        $this->insert('{{%language_source}}', ['id' => '96', 'category' => 'user', 'message' => 'Current password']);
        $this->insert('{{%language_source}}', ['id' => '97', 'category' => 'user', 'message' => 'Your email address has been changed']);
        $this->insert('{{%language_source}}', ['id' => '98', 'category' => 'user', 'message' => 'A confirmation message has been sent to your new email address']);
        $this->insert('{{%language_source}}', ['id' => '99', 'category' => 'user', 'message' => 'We have sent confirmation links to both old and new email addresses. You must click both links to complete your request']);
        $this->insert('{{%language_source}}', ['id' => '100', 'category' => 'user', 'message' => 'This account has already been confirmed']);
        $this->insert('{{%language_source}}', ['id' => '101', 'category' => 'user', 'message' => 'A message has been sent to your email address. It contains a confirmation link that you must click to complete registration.']);
        $this->insert('{{%language_source}}', ['id' => '102', 'category' => 'user', 'message' => 'Name']);
        $this->insert('{{%language_source}}', ['id' => '103', 'category' => 'user', 'message' => 'Email (public)']);
        $this->insert('{{%language_source}}', ['id' => '104', 'category' => 'user', 'message' => 'Gravatar email']);
        $this->insert('{{%language_source}}', ['id' => '105', 'category' => 'user', 'message' => 'Location']);
        $this->insert('{{%language_source}}', ['id' => '106', 'category' => 'user', 'message' => 'Website']);
        $this->insert('{{%language_source}}', ['id' => '107', 'category' => 'user', 'message' => 'Bio']);
        $this->insert('{{%language_source}}', ['id' => '108', 'category' => 'user', 'message' => 'Login']);
        $this->insert('{{%language_source}}', ['id' => '109', 'category' => 'user', 'message' => 'Password']);
        $this->insert('{{%language_source}}', ['id' => '110', 'category' => 'user', 'message' => 'Remember me next time']);
        $this->insert('{{%language_source}}', ['id' => '111', 'category' => 'user', 'message' => 'Invalid login or password']);
        $this->insert('{{%language_source}}', ['id' => '112', 'category' => 'user', 'message' => 'You need to confirm your email address']);
        $this->insert('{{%language_source}}', ['id' => '113', 'category' => 'user', 'message' => 'Your account has been blocked']);
        $this->insert('{{%language_source}}', ['id' => '114', 'category' => 'user', 'message' => 'Registration ip']);
        $this->insert('{{%language_source}}', ['id' => '115', 'category' => 'user', 'message' => 'New email']);
        $this->insert('{{%language_source}}', ['id' => '116', 'category' => 'user', 'message' => 'Registration time']);
        $this->insert('{{%language_source}}', ['id' => '117', 'category' => 'user', 'message' => 'Confirmation time']);
        $this->insert('{{%language_source}}', ['id' => '118', 'category' => 'user', 'message' => 'This username has already been taken']);
        $this->insert('{{%language_source}}', ['id' => '119', 'category' => 'user', 'message' => 'This email address has already been taken']);
        $this->insert('{{%language_source}}', ['id' => '120', 'category' => 'user', 'message' => 'Thank you, registration is now complete.']);
        $this->insert('{{%language_source}}', ['id' => '121', 'category' => 'user', 'message' => 'Something went wrong and your account has not been confirmed.']);
        $this->insert('{{%language_source}}', ['id' => '122', 'category' => 'user', 'message' => 'The confirmation link is invalid or expired. Please try requesting a new one.']);
        $this->insert('{{%language_source}}', ['id' => '123', 'category' => 'user', 'message' => 'Your confirmation token is invalid or expired']);
        $this->insert('{{%language_source}}', ['id' => '124', 'category' => 'user', 'message' => 'An error occurred processing your request']);
        $this->insert('{{%language_source}}', ['id' => '125', 'category' => 'user', 'message' => 'Awesome, almost there. Now you need to click the confirmation link sent to your old email address']);
        $this->insert('{{%language_source}}', ['id' => '126', 'category' => 'user', 'message' => 'Awesome, almost there. Now you need to click the confirmation link sent to your new email address']);
        $this->insert('{{%language_source}}', ['id' => '127', 'category' => 'user', 'message' => 'There is no user with this email address']);
        $this->insert('{{%language_source}}', ['id' => '128', 'category' => 'user', 'message' => 'An email has been sent with instructions for resetting your password']);
        $this->insert('{{%language_source}}', ['id' => '129', 'category' => 'user', 'message' => 'Your password has been changed successfully.']);
        $this->insert('{{%language_source}}', ['id' => '130', 'category' => 'user', 'message' => 'An error occurred and your password has not been changed. Please try again later.']);
        $this->insert('{{%language_source}}', ['id' => '131', 'category' => 'user', 'message' => 'Something went wrong']);
        $this->insert('{{%language_source}}', ['id' => '132', 'category' => 'user', 'message' => 'Your account has been connected']);
        $this->insert('{{%language_source}}', ['id' => '133', 'category' => 'user', 'message' => 'This account has already been connected to another user']);
        $this->insert('{{%language_source}}', ['id' => '134', 'category' => 'user', 'message' => 'Your account has been created and a message with further instructions has been sent to your email']);
        $this->insert('{{%language_source}}', ['id' => '135', 'category' => 'user', 'message' => 'Profile settings']);
        $this->insert('{{%language_source}}', ['id' => '136', 'category' => 'user', 'message' => 'Change your avatar at Gravatar.com']);
        $this->insert('{{%language_source}}', ['id' => '137', 'category' => 'user', 'message' => 'Save']);
        $this->insert('{{%language_source}}', ['id' => '138', 'category' => 'user', 'message' => 'Profile']);
        $this->insert('{{%language_source}}', ['id' => '139', 'category' => 'user', 'message' => 'Account']);
        $this->insert('{{%language_source}}', ['id' => '140', 'category' => 'user', 'message' => 'Networks']);
        $this->insert('{{%language_source}}', ['id' => '141', 'category' => 'user', 'message' => 'You can connect multiple accounts to be able to log in using them']);
        $this->insert('{{%language_source}}', ['id' => '142', 'category' => 'user', 'message' => 'Disconnect']);
        $this->insert('{{%language_source}}', ['id' => '143', 'category' => 'user', 'message' => 'Connect']);
        $this->insert('{{%language_source}}', ['id' => '144', 'category' => 'user', 'message' => 'Account settings']);
        $this->insert('{{%language_source}}', ['id' => '145', 'category' => 'user', 'message' => 'Joined on {0, date}']);
        $this->insert('{{%language_source}}', ['id' => '146', 'category' => 'user', 'message' => 'Registration IP']);
        $this->insert('{{%language_source}}', ['id' => '147', 'category' => 'user', 'message' => 'Confirmation status']);
        $this->insert('{{%language_source}}', ['id' => '148', 'category' => 'user', 'message' => 'Confirmed at {0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '149', 'category' => 'user', 'message' => 'Unconfirmed']);
        $this->insert('{{%language_source}}', ['id' => '150', 'category' => 'user', 'message' => 'Blocked at {0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '151', 'category' => 'user', 'message' => 'Not blocked']);
        $this->insert('{{%language_source}}', ['id' => '152', 'category' => 'user', 'message' => 'Update user account']);
        $this->insert('{{%language_source}}', ['id' => '153', 'category' => 'user', 'message' => 'Users']);
        $this->insert('{{%language_source}}', ['id' => '154', 'category' => 'user', 'message' => 'Account details']);
        $this->insert('{{%language_source}}', ['id' => '155', 'category' => 'user', 'message' => 'Profile details']);
        $this->insert('{{%language_source}}', ['id' => '156', 'category' => 'user', 'message' => 'Information']);
        $this->insert('{{%language_source}}', ['id' => '157', 'category' => 'user', 'message' => 'Assignments']);
        $this->insert('{{%language_source}}', ['id' => '158', 'category' => 'user', 'message' => 'Delete']);
        $this->insert('{{%language_source}}', ['id' => '159', 'category' => 'user', 'message' => 'Are you sure you want to delete this user?']);
        $this->insert('{{%language_source}}', ['id' => '160', 'category' => 'user', 'message' => 'You can assign multiple roles or permissions to user by using the form below']);
        $this->insert('{{%language_source}}', ['id' => '161', 'category' => 'user', 'message' => 'Create a user account']);
        $this->insert('{{%language_source}}', ['id' => '162', 'category' => 'user', 'message' => 'Credentials will be sent to the user by email']);
        $this->insert('{{%language_source}}', ['id' => '163', 'category' => 'user', 'message' => 'A password will be generated automatically if not provided']);
        $this->insert('{{%language_source}}', ['id' => '164', 'category' => 'user', 'message' => 'Update']);
        $this->insert('{{%language_source}}', ['id' => '165', 'category' => 'user', 'message' => 'Roles']);
        $this->insert('{{%language_source}}', ['id' => '166', 'category' => 'user', 'message' => 'Permissions']);
        $this->insert('{{%language_source}}', ['id' => '167', 'category' => 'user', 'message' => 'Create']);
        $this->insert('{{%language_source}}', ['id' => '168', 'category' => 'user', 'message' => 'New user']);
        $this->insert('{{%language_source}}', ['id' => '169', 'category' => 'user', 'message' => 'New role']);
        $this->insert('{{%language_source}}', ['id' => '170', 'category' => 'user', 'message' => 'New permission']);
        $this->insert('{{%language_source}}', ['id' => '171', 'category' => 'user', 'message' => 'Sign up']);
        $this->insert('{{%language_source}}', ['id' => '172', 'category' => 'user', 'message' => 'Already registered? Sign in!']);
        $this->insert('{{%language_source}}', ['id' => '173', 'category' => 'user', 'message' => 'In order to finish your registration, we need you to enter following fields']);
        $this->insert('{{%language_source}}', ['id' => '174', 'category' => 'user', 'message' => 'Continue']);
        $this->insert('{{%language_source}}', ['id' => '175', 'category' => 'user', 'message' => 'If you already registered, sign in and connect this account on settings page']);
        $this->insert('{{%language_source}}', ['id' => '176', 'category' => 'user', 'message' => 'Request new confirmation message']);
        $this->insert('{{%language_source}}', ['id' => '177', 'category' => 'user', 'message' => 'Hello']);
        $this->insert('{{%language_source}}', ['id' => '178', 'category' => 'user', 'message' => 'We have received a request to change the email address for your account on {0}']);
        $this->insert('{{%language_source}}', ['id' => '179', 'category' => 'user', 'message' => 'In order to complete your request, please click the link below']);
        $this->insert('{{%language_source}}', ['id' => '180', 'category' => 'user', 'message' => 'If you cannot click the link, please try pasting the text into your browser']);
        $this->insert('{{%language_source}}', ['id' => '181', 'category' => 'user', 'message' => 'If you did not make this request you can ignore this email']);
        $this->insert('{{%language_source}}', ['id' => '182', 'category' => 'user', 'message' => 'Your account on {0} has been created']);
        $this->insert('{{%language_source}}', ['id' => '183', 'category' => 'user', 'message' => 'We have generated a password for you']);
        $this->insert('{{%language_source}}', ['id' => '184', 'category' => 'user', 'message' => 'In order to complete your registration, please click the link below']);
        $this->insert('{{%language_source}}', ['id' => '185', 'category' => 'user', 'message' => 'Thank you for signing up on {0}']);
        $this->insert('{{%language_source}}', ['id' => '186', 'category' => 'user', 'message' => 'We have received a request to reset the password for your account on {0}']);
        $this->insert('{{%language_source}}', ['id' => '187', 'category' => 'user', 'message' => 'Please click the link below to complete your password reset']);
        $this->insert('{{%language_source}}', ['id' => '188', 'category' => 'user', 'message' => 'Forgot password?']);
        $this->insert('{{%language_source}}', ['id' => '189', 'category' => 'user', 'message' => 'Didn\'t receive confirmation message?']);
        $this->insert('{{%language_source}}', ['id' => '190', 'category' => 'user', 'message' => 'Don\'t have an account? Sign up!']);
        $this->insert('{{%language_source}}', ['id' => '191', 'category' => 'user', 'message' => 'Reset your password']);
        $this->insert('{{%language_source}}', ['id' => '192', 'category' => 'user', 'message' => 'Finish']);
        $this->insert('{{%language_source}}', ['id' => '193', 'category' => 'user', 'message' => 'Recover your password']);
        $this->insert('{{%language_source}}', ['id' => '194', 'category' => 'user', 'message' => 'Are you sure? Deleted user can not be restored']);
        $this->insert('{{%language_source}}', ['id' => '195', 'category' => 'user', 'message' => 'User is not found']);
        $this->insert('{{%language_source}}', ['id' => '196', 'category' => 'user', 'message' => 'Error occurred while deleting user']);
        $this->insert('{{%language_source}}', ['id' => '197', 'category' => 'user', 'message' => 'Error occurred while changing password']);
        $this->insert('{{%language_source}}', ['id' => '198', 'category' => 'user', 'message' => 'Please fix following errors:']);
        $this->insert('{{%language_source}}', ['id' => '199', 'category' => 'user', 'message' => 'Error occurred while confirming user']);
        $this->insert('{{%language_source}}', ['id' => '200', 'category' => 'user', 'message' => 'Yandex']);
        $this->insert('{{%language_source}}', ['id' => '201', 'category' => 'user', 'message' => 'VKontakte']);
        $this->insert('{{%language_source}}', ['id' => '202', 'category' => 'model', 'message' => 'ID']);
        $this->insert('{{%language_source}}', ['id' => '203', 'category' => 'model', 'message' => 'Language']);
        $this->insert('{{%language_source}}', ['id' => '204', 'category' => 'model', 'message' => 'Translation']);
        $this->insert('{{%language_source}}', ['id' => '205', 'category' => 'model', 'message' => 'Category']);
        $this->insert('{{%language_source}}', ['id' => '206', 'category' => 'model', 'message' => 'Message']);
        $this->insert('{{%language_source}}', ['id' => '207', 'category' => 'model', 'message' => 'Language ID']);
        $this->insert('{{%language_source}}', ['id' => '208', 'category' => 'model', 'message' => 'Country']);
        $this->insert('{{%language_source}}', ['id' => '209', 'category' => 'model', 'message' => 'Name']);
        $this->insert('{{%language_source}}', ['id' => '210', 'category' => 'model', 'message' => 'Name Ascii']);
        $this->insert('{{%language_source}}', ['id' => '211', 'category' => 'model', 'message' => 'Status']);
        $this->insert('{{%language_source}}', ['id' => '215', 'category' => 'db_rbac', 'message' => 'Страница не найдена']);
        $this->insert('{{%language_source}}', ['id' => '216', 'category' => 'db_rbac', 'message' => 'Значение \"{field}\" содержит не допустимые символы']);
        $this->insert('{{%language_source}}', ['id' => '217', 'category' => 'db_rbac', 'message' => 'Роль с таким именем уже существует: ']);
        $this->insert('{{%language_source}}', ['id' => '218', 'category' => 'db_rbac', 'message' => 'Правило с таким именем уже существует: ']);
        $this->insert('{{%language_source}}', ['id' => '219', 'category' => 'db_rbac', 'message' => 'Необходимо указать класс User в настройках модуля']);
        $this->insert('{{%language_source}}', ['id' => '220', 'category' => 'db_rbac', 'message' => 'UserClass должен реализовывать интерфейс developeruzdb_rbacUserRbacInterface']);
        $this->insert('{{%language_source}}', ['id' => '221', 'category' => 'db_rbac', 'message' => 'Пользователь не найден']);
        $this->insert('{{%language_source}}', ['id' => '222', 'category' => 'db_rbac', 'message' => 'Редактирование роли: ']);
        $this->insert('{{%language_source}}', ['id' => '223', 'category' => 'db_rbac', 'message' => 'Управление ролями']);
        $this->insert('{{%language_source}}', ['id' => '224', 'category' => 'db_rbac', 'message' => 'Редактирование']);
        $this->insert('{{%language_source}}', ['id' => '225', 'category' => 'db_rbac', 'message' => 'Название роли']);
        $this->insert('{{%language_source}}', ['id' => '226', 'category' => 'db_rbac', 'message' => 'Текстовое описание']);
        $this->insert('{{%language_source}}', ['id' => '227', 'category' => 'db_rbac', 'message' => 'Разрешенные доступы']);
        $this->insert('{{%language_source}}', ['id' => '228', 'category' => 'db_rbac', 'message' => 'Сохранить']);
        $this->insert('{{%language_source}}', ['id' => '229', 'category' => 'db_rbac', 'message' => 'Новая роль']);
        $this->insert('{{%language_source}}', ['id' => '230', 'category' => 'db_rbac', 'message' => 'Правила доступа']);
        $this->insert('{{%language_source}}', ['id' => '231', 'category' => 'db_rbac', 'message' => 'Добавить новое правило']);
        $this->insert('{{%language_source}}', ['id' => '232', 'category' => 'db_rbac', 'message' => 'Правило']);
        $this->insert('{{%language_source}}', ['id' => '233', 'category' => 'db_rbac', 'message' => 'Описание']);
        $this->insert('{{%language_source}}', ['id' => '234', 'category' => 'db_rbac', 'message' => 'Добавить роль']);
        $this->insert('{{%language_source}}', ['id' => '235', 'category' => 'db_rbac', 'message' => 'Роль']);
        $this->insert('{{%language_source}}', ['id' => '236', 'category' => 'db_rbac', 'message' => 'Редактирование правила: ']);
        $this->insert('{{%language_source}}', ['id' => '237', 'category' => 'db_rbac', 'message' => 'Редактирование правила']);
        $this->insert('{{%language_source}}', ['id' => '238', 'category' => 'db_rbac', 'message' => 'Разрешенный доступ']);
        $this->insert('{{%language_source}}', ['id' => '239', 'category' => 'db_rbac', 'message' => 'Новое правило']);
        $this->insert('{{%language_source}}', ['id' => '240', 'category' => 'db_rbac', 'message' => '
            * Формат module/controller/action

            site/article - доступ к странице site/article

            site - доступ к любым action контроллера site']);
        $this->insert('{{%language_source}}', ['id' => '241', 'category' => 'db_rbac', 'message' => 'Управление ролями пользователя']);
        $this->insert('{{%language_source}}', ['id' => '242', 'category' => 'db_rbac', 'message' => 'Недостаточно прав']);
        $this->insert('{{%language_source}}', ['id' => '244', 'category' => 'array', 'message' => 'Inactive']);
        $this->insert('{{%language_source}}', ['id' => '245', 'category' => 'array', 'message' => 'Active']);
        $this->insert('{{%language_source}}', ['id' => '246', 'category' => 'array', 'message' => 'Beta']);
        $this->insert('{{%language_source}}', ['id' => '247', 'category' => 'javascript', 'message' => 'Translation Language: {name}']);
        $this->insert('{{%language_source}}', ['id' => '248', 'category' => 'javascript', 'message' => 'Save']);
        $this->insert('{{%language_source}}', ['id' => '249', 'category' => 'javascript', 'message' => 'Close']);
        $this->insert('{{%language_source}}', ['id' => '250', 'category' => 'javascript', 'message' => 'Are you sure you want to delete these items?']);
        $this->insert('{{%language_source}}', ['id' => '251', 'category' => 'javascript', 'message' => 'Are you sure you want to delete this item?']);
        $this->insert('{{%language_source}}', ['id' => '252', 'category' => 'app', 'message' => 'Roles']);
        $this->insert('{{%language_source}}', ['id' => '253', 'category' => 'app', 'message' => 'Permissions']);
        $this->insert('{{%language_source}}', ['id' => '254', 'category' => 'app', 'message' => 'Gallery']);
        $this->insert('{{%language_source}}', ['id' => '255', 'category' => 'app', 'message' => 'Menu']);
        $this->insert('{{%language_source}}', ['id' => '256', 'category' => 'app', 'message' => 'Pages']);
        $this->insert('{{%language_source}}', ['id' => '257', 'category' => 'app', 'message' => 'Utilities']);
        $this->insert('{{%language_source}}', ['id' => '263', 'category' => 'gallery', 'message' => 'There is no gallery with code \"{code}\"']);
        $this->insert('{{%language_source}}', ['id' => '264', 'category' => 'gallery', 'message' => 'Edit']);
        $this->insert('{{%language_source}}', ['id' => '265', 'category' => 'gallery', 'message' => 'Gallery has been created']);
        $this->insert('{{%language_source}}', ['id' => '266', 'category' => 'gallery', 'message' => 'Gallery has been updated']);
        $this->insert('{{%language_source}}', ['id' => '267', 'category' => 'gallery', 'message' => 'Gallery has been deleted']);
        $this->insert('{{%language_source}}', ['id' => '268', 'category' => 'gallery', 'message' => 'Image has been created']);
        $this->insert('{{%language_source}}', ['id' => '269', 'category' => 'gallery', 'message' => 'Image has been updated']);
        $this->insert('{{%language_source}}', ['id' => '270', 'category' => 'gallery', 'message' => 'Image has been deleted']);
        $this->insert('{{%language_source}}', ['id' => '271', 'category' => 'gallery', 'message' => 'Gallery']);
        $this->insert('{{%language_source}}', ['id' => '272', 'category' => 'gallery', 'message' => 'Alt']);
        $this->insert('{{%language_source}}', ['id' => '273', 'category' => 'gallery', 'message' => 'Sort index']);
        $this->insert('{{%language_source}}', ['id' => '274', 'category' => 'gallery', 'message' => 'Created at']);
        $this->insert('{{%language_source}}', ['id' => '275', 'category' => 'gallery', 'message' => 'Code']);
        $this->insert('{{%language_source}}', ['id' => '276', 'category' => 'gallery', 'message' => 'Name']);
        $this->insert('{{%language_source}}', ['id' => '277', 'category' => 'gallery', 'message' => 'Description']);
        $this->insert('{{%language_source}}', ['id' => '278', 'category' => 'gallery', 'message' => 'Updated at']);
        $this->insert('{{%language_source}}', ['id' => '279', 'category' => 'gallery', 'message' => 'Image']);
        $this->insert('{{%language_source}}', ['id' => '280', 'category' => 'gallery', 'message' => 'Update gallery']);
        $this->insert('{{%language_source}}', ['id' => '281', 'category' => 'gallery', 'message' => 'Galleries']);
        $this->insert('{{%language_source}}', ['id' => '282', 'category' => 'gallery', 'message' => 'Information']);
        $this->insert('{{%language_source}}', ['id' => '283', 'category' => 'gallery', 'message' => 'Created at {0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '284', 'category' => 'gallery', 'message' => 'Don\'t change this value, if you not sure for what it is for.']);
        $this->insert('{{%language_source}}', ['id' => '285', 'category' => 'gallery', 'message' => 'Save']);
        $this->insert('{{%language_source}}', ['id' => '286', 'category' => 'gallery', 'message' => 'Update image']);
        $this->insert('{{%language_source}}', ['id' => '287', 'category' => 'gallery', 'message' => 'Images']);
        $this->insert('{{%language_source}}', ['id' => '288', 'category' => 'gallery', 'message' => 'Create image']);
        $this->insert('{{%language_source}}', ['id' => '289', 'category' => 'gallery', 'message' => 'Manage images']);
        $this->insert('{{%language_source}}', ['id' => '290', 'category' => 'gallery', 'message' => '{0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '291', 'category' => 'gallery', 'message' => 'Create gallery']);
        $this->insert('{{%language_source}}', ['id' => '292', 'category' => 'gallery', 'message' => 'Be careful in Code field. Pay attention to field hint.']);
        $this->insert('{{%language_source}}', ['id' => '293', 'category' => 'gallery', 'message' => 'Only latin characters, numbers and symbols (.-_) allowed. Spaces not allowed.']);
        $this->insert('{{%language_source}}', ['id' => '294', 'category' => 'gallery', 'message' => 'Manage galleries']);
        $this->insert('{{%language_source}}', ['id' => '295', 'category' => 'vova07/imperavi', 'message' => 'ERROR_CAN_NOT_UPLOAD_FILE']);
        $this->insert('{{%language_source}}', ['id' => '296', 'category' => 'imperavi', 'message' => 'ERROR_CAN_NOT_UPLOAD_FILE']);
        $this->insert('{{%language_source}}', ['id' => '297', 'category' => 'app', 'message' => 'Video Gallery']);
        $this->insert('{{%language_source}}', ['id' => '298', 'category' => 'app', 'message' => 'Blocks']);
        $this->insert('{{%language_source}}', ['id' => '299', 'category' => 'app', 'message' => 'Settings']);
        $this->insert('{{%language_source}}', ['id' => '300', 'category' => 'app', 'message' => 'Menu has been created.']);
        $this->insert('{{%language_source}}', ['id' => '301', 'category' => 'app', 'message' => 'Menu has been updated.']);
        $this->insert('{{%language_source}}', ['id' => '302', 'category' => 'app', 'message' => 'Menu has been deleted.']);
        $this->insert('{{%language_source}}', ['id' => '303', 'category' => 'app', 'message' => 'Are you sure to delete this menu?']);
        $this->insert('{{%language_source}}', ['id' => '304', 'category' => 'app', 'message' => 'Update']);
        $this->insert('{{%language_source}}', ['id' => '305', 'category' => 'app', 'message' => 'Menus']);
        $this->insert('{{%language_source}}', ['id' => '306', 'category' => 'app', 'message' => 'Create']);
        $this->insert('{{%language_source}}', ['id' => '307', 'category' => 'app', 'message' => 'Save']);
        $this->insert('{{%language_source}}', ['id' => '308', 'category' => 'app', 'message' => 'Create Menu']);
        $this->insert('{{%language_source}}', ['id' => '309', 'category' => 'app', 'message' => 'Back']);
        $this->insert('{{%language_source}}', ['id' => '310', 'category' => 'app', 'message' => 'View']);
        $this->insert('{{%language_source}}', ['id' => '311', 'category' => 'app', 'message' => 'Delete']);
        $this->insert('{{%language_source}}', ['id' => '312', 'category' => 'app', 'message' => 'Menu Manager']);
        $this->insert('{{%language_source}}', ['id' => '313', 'category' => 'setting', 'message' => 'ID']);
        $this->insert('{{%language_source}}', ['id' => '314', 'category' => 'setting', 'message' => 'Parent ID']);
        $this->insert('{{%language_source}}', ['id' => '315', 'category' => 'setting', 'message' => 'Code']);
        $this->insert('{{%language_source}}', ['id' => '316', 'category' => 'setting', 'message' => 'Type']);
        $this->insert('{{%language_source}}', ['id' => '317', 'category' => 'setting', 'message' => 'Store Range']);
        $this->insert('{{%language_source}}', ['id' => '318', 'category' => 'setting', 'message' => 'Store Dir']);
        $this->insert('{{%language_source}}', ['id' => '319', 'category' => 'setting', 'message' => 'Value']);
        $this->insert('{{%language_source}}', ['id' => '320', 'category' => 'setting', 'message' => 'Sort Order']);
        $this->insert('{{%language_source}}', ['id' => '321', 'category' => 'setting', 'message' => 'Setting']);
        $this->insert('{{%language_source}}', ['id' => '322', 'category' => 'setting', 'message' => 'Update']);
        $this->insert('{{%language_source}}', ['id' => '323', 'category' => 'kvbase', 'message' => 'It is recommended you use an upgraded browser to display the {type} control properly.']);
        $this->insert('{{%language_source}}', ['id' => '324', 'category' => 'video_gallery', 'message' => 'Video gallery has been created']);
        $this->insert('{{%language_source}}', ['id' => '325', 'category' => 'video_gallery', 'message' => 'Video gallery has been updated']);
        $this->insert('{{%language_source}}', ['id' => '326', 'category' => 'video_gallery', 'message' => 'Video gallery has been deleted']);
        $this->insert('{{%language_source}}', ['id' => '327', 'category' => 'video_gallery', 'message' => 'Video has been created']);
        $this->insert('{{%language_source}}', ['id' => '328', 'category' => 'video_gallery', 'message' => 'Video has been updated']);
        $this->insert('{{%language_source}}', ['id' => '329', 'category' => 'video_gallery', 'message' => 'Video has been deleted']);
        $this->insert('{{%language_source}}', ['id' => '330', 'category' => 'video_gallery', 'message' => 'Video gallery']);
        $this->insert('{{%language_source}}', ['id' => '331', 'category' => 'video_gallery', 'message' => 'Video url']);
        $this->insert('{{%language_source}}', ['id' => '332', 'category' => 'video_gallery', 'message' => 'Code']);
        $this->insert('{{%language_source}}', ['id' => '333', 'category' => 'video_gallery', 'message' => 'Title']);
        $this->insert('{{%language_source}}', ['id' => '334', 'category' => 'video_gallery', 'message' => 'Sort index']);
        $this->insert('{{%language_source}}', ['id' => '335', 'category' => 'video_gallery', 'message' => 'Created at']);
        $this->insert('{{%language_source}}', ['id' => '336', 'category' => 'video_gallery', 'message' => 'Name']);
        $this->insert('{{%language_source}}', ['id' => '337', 'category' => 'video_gallery', 'message' => 'Description']);
        $this->insert('{{%language_source}}', ['id' => '338', 'category' => 'video_gallery', 'message' => 'Updated at']);
        $this->insert('{{%language_source}}', ['id' => '339', 'category' => 'video_gallery', 'message' => 'Update video gallery']);
        $this->insert('{{%language_source}}', ['id' => '340', 'category' => 'video_gallery', 'message' => 'Galleries']);
        $this->insert('{{%language_source}}', ['id' => '341', 'category' => 'video_gallery', 'message' => 'Information']);
        $this->insert('{{%language_source}}', ['id' => '342', 'category' => 'video_gallery', 'message' => 'Created at {0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '343', 'category' => 'video_gallery', 'message' => 'Don\'t change this value, if you not sure for what it is for.']);
        $this->insert('{{%language_source}}', ['id' => '344', 'category' => 'video_gallery', 'message' => 'Save']);
        $this->insert('{{%language_source}}', ['id' => '345', 'category' => 'video_gallery', 'message' => 'Create video gallery']);
        $this->insert('{{%language_source}}', ['id' => '346', 'category' => 'video_gallery', 'message' => 'Be careful in Code field. Pay attention to field hint.']);
        $this->insert('{{%language_source}}', ['id' => '347', 'category' => 'video_gallery', 'message' => 'Only latin characters, numbers and symbols (.-_) allowed. Spaces not allowed.']);
        $this->insert('{{%language_source}}', ['id' => '348', 'category' => 'video_gallery', 'message' => 'Update video']);
        $this->insert('{{%language_source}}', ['id' => '349', 'category' => 'video_gallery', 'message' => 'Videos']);
        $this->insert('{{%language_source}}', ['id' => '350', 'category' => 'video_gallery', 'message' => 'Create video']);
        $this->insert('{{%language_source}}', ['id' => '351', 'category' => 'video_gallery', 'message' => 'Manage videos']);
        $this->insert('{{%language_source}}', ['id' => '352', 'category' => 'video_gallery', 'message' => '{0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '353', 'category' => 'video_gallery', 'message' => 'Manage video galleries']);
        $this->insert('{{%language_source}}', ['id' => '354', 'category' => 'block', 'message' => 'Edit']);
        $this->insert('{{%language_source}}', ['id' => '355', 'category' => 'block', 'message' => 'Add text here.']);
        $this->insert('{{%language_source}}', ['id' => '356', 'category' => 'block', 'message' => 'Block has been created']);
        $this->insert('{{%language_source}}', ['id' => '357', 'category' => 'block', 'message' => 'Block has been updated']);
        $this->insert('{{%language_source}}', ['id' => '358', 'category' => 'block', 'message' => 'Block has been deleted']);
        $this->insert('{{%language_source}}', ['id' => '359', 'category' => 'block', 'message' => 'Name']);
        $this->insert('{{%language_source}}', ['id' => '360', 'category' => 'block', 'message' => 'Code']);
        $this->insert('{{%language_source}}', ['id' => '361', 'category' => 'block', 'message' => 'Created at']);
        $this->insert('{{%language_source}}', ['id' => '362', 'category' => 'block', 'message' => 'Value']);
        $this->insert('{{%language_source}}', ['id' => '363', 'category' => 'block', 'message' => 'Updated at']);
        $this->insert('{{%language_source}}', ['id' => '364', 'category' => 'block', 'message' => 'Update block']);
        $this->insert('{{%language_source}}', ['id' => '365', 'category' => 'block', 'message' => 'Blocks']);
        $this->insert('{{%language_source}}', ['id' => '366', 'category' => 'block', 'message' => 'Information']);
        $this->insert('{{%language_source}}', ['id' => '367', 'category' => 'block', 'message' => 'Created at {0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '368', 'category' => 'block', 'message' => 'Don\'t change this value, if you not sure for what it is for.']);
        $this->insert('{{%language_source}}', ['id' => '369', 'category' => 'block', 'message' => 'Save']);
        $this->insert('{{%language_source}}', ['id' => '370', 'category' => 'block', 'message' => 'Create block']);
        $this->insert('{{%language_source}}', ['id' => '371', 'category' => 'block', 'message' => 'Be careful in Code field. Pay attention to field hint.']);
        $this->insert('{{%language_source}}', ['id' => '372', 'category' => 'block', 'message' => 'Only latin characters, numbers and symbols (.-_) allowed. Spaces not allowed.']);
        $this->insert('{{%language_source}}', ['id' => '373', 'category' => 'block', 'message' => 'Manage blocks']);
        $this->insert('{{%language_source}}', ['id' => '374', 'category' => 'block', 'message' => '{0, date, MMMM dd, YYYY HH:mm}']);
        $this->insert('{{%language_source}}', ['id' => '375', 'category' => 'audit', 'message' => 'Menu']);
        $this->insert('{{%language_source}}', ['id' => '376', 'category' => 'audit', 'message' => 'Tree']);
        $this->insert('{{%language_source}}', ['id' => '381', 'category' => 'app', 'message' => 'Invalid characters in code.']);
        $this->insert('{{%language_source}}', ['id' => '382', 'category' => 'app', 'message' => '{brand}']);
        $this->insert('{{%language_source}}', ['id' => '383', 'category' => 'front', 'message' => 'Novotek']);
        $this->insert('{{%language_source}}', ['id' => '402', 'category' => 'database', 'message' => 'Home']);
        $this->insert('{{%language_translate}}', ['id' => '1', 'language' => 'uk-UA', 'translation' => 'В мережі']);
        $this->insert('{{%language_translate}}', ['id' => '5', 'language' => 'ru-RU', 'translation' => 'Главная']);
   //     $this->insert('{{%language_translate}}', ['id' => '5', 'language' => 'uk-UA', 'translation' => 'Головна']);
        $this->insert('{{%language_translate}}', ['id' => '7', 'language' => 'uk-UA', 'translation' => 'Головне Меню']);
        $this->insert('{{%language_translate}}', ['id' => '53', 'language' => 'ru-RU', 'translation' => 'Главная']);
    //    $this->insert('{{%language_translate}}', ['id' => '53', 'language' => 'uk-UA', 'translation' => 'Головна']);
        $this->insert('{{%language_translate}}', ['id' => '254', 'language' => 'uk-UA', 'translation' => 'Галерея']);
        $this->insert('{{%language_translate}}', ['id' => '383', 'language' => 'uk-UA', 'translation' => 'Новотек']);
        $this->insert('{{%language_translate}}', ['id' => '402', 'language' => 'uk-UA', 'translation' => 'Головна']);
        $this->insert('{{%menu}}', ['id' => '1', 'tree' => '1', 'lft' => '1', 'rgt' => '18', 'depth' => '0', 'name' => 'Main', 'url' => '#', 'code' => 'main']);
        $this->insert('{{%menu}}', ['id' => '2', 'tree' => '1', 'lft' => '2', 'rgt' => '3', 'depth' => '1', 'name' => 'Home', 'url' => '/', 'code' => 'home']);
        $this->insert('{{%menu}}', ['id' => '5', 'tree' => '1', 'lft' => '4', 'rgt' => '5', 'depth' => '1', 'name' => 'Our Services', 'url' => '/site/services', 'code' => 'services']);
        $this->insert('{{%menu}}', ['id' => '8', 'tree' => '1', 'lft' => '16', 'rgt' => '17', 'depth' => '1', 'name' => 'Contact', 'url' => '/contact', 'code' => 'contact']);
        $this->insert('{{%menu}}', ['id' => '9', 'tree' => '1', 'lft' => '6', 'rgt' => '11', 'depth' => '1', 'name' => 'Events', 'url' => '/events', 'code' => 'events']);
        $this->insert('{{%menu}}', ['id' => '10', 'tree' => '1', 'lft' => '12', 'rgt' => '15', 'depth' => '1', 'name' => 'Gallery', 'url' => '/gallery', 'code' => 'gallery']);
        $this->insert('{{%menu}}', ['id' => '12', 'tree' => '1', 'lft' => '9', 'rgt' => '10', 'depth' => '2', 'name' => 'New event', 'url' => '/new-event', 'code' => 'event1']);
        $this->insert('{{%menu}}', ['id' => '13', 'tree' => '13', 'lft' => '1', 'rgt' => '4', 'depth' => '0', 'name' => 'Footer', 'url' => '#', 'code' => 'footer']);
        $this->insert('{{%menu}}', ['id' => '14', 'tree' => '13', 'lft' => '2', 'rgt' => '3', 'depth' => '1', 'name' => 'Home', 'url' => '/', 'code' => 'home']);
        $this->insert('{{%menu}}', ['id' => '15', 'tree' => '1', 'lft' => '7', 'rgt' => '8', 'depth' => '2', 'name' => 'New event 2', 'url' => '/new-event2', 'code' => 'event2']);
        $this->insert('{{%menu}}', ['id' => '16', 'tree' => '1', 'lft' => '13', 'rgt' => '14', 'depth' => '2', 'name' => 'New Gallery', 'url' => '/gallery1', 'code' => 'gallery1']);
        $this->insert('{{%migration}}', ['version' => 'm000000_000000_base', 'apply_time' => '1459260427']);
        $this->insert('{{%migration}}', ['version' => 'm140209_132017_init', 'apply_time' => '1459260472']);
        $this->insert('{{%migration}}', ['version' => 'm140403_174025_create_account_table', 'apply_time' => '1459260473']);
        $this->insert('{{%migration}}', ['version' => 'm140504_113157_update_tables', 'apply_time' => '1459260474']);
        $this->insert('{{%migration}}', ['version' => 'm140504_130429_create_token_table', 'apply_time' => '1459260474']);
        $this->insert('{{%migration}}', ['version' => 'm140506_102106_rbac_init', 'apply_time' => '1459260430']);
        $this->insert('{{%migration}}', ['version' => 'm140701_090001_init', 'apply_time' => '1459713224']);
        $this->insert('{{%migration}}', ['version' => 'm140830_171933_fix_ip_field', 'apply_time' => '1459260474']);
        $this->insert('{{%migration}}', ['version' => 'm140830_172703_change_account_table_name', 'apply_time' => '1459260474']);
        $this->insert('{{%migration}}', ['version' => 'm141002_030233_translate_manager', 'apply_time' => '1459332567']);
        $this->insert('{{%migration}}', ['version' => 'm141021_075310_init', 'apply_time' => '1459713529']);
        $this->insert('{{%migration}}', ['version' => 'm141129_130551_create_filemanager_mediafile_table', 'apply_time' => '1459344083']);
        $this->insert('{{%migration}}', ['version' => 'm141203_173402_create_filemanager_owners_table', 'apply_time' => '1459344083']);
        $this->insert('{{%migration}}', ['version' => 'm141203_175538_add_filemanager_owners_ref_mediafile_fk', 'apply_time' => '1459344084']);
        $this->insert('{{%migration}}', ['version' => 'm141208_201488_setting_init', 'apply_time' => '1459938661']);
        $this->insert('{{%migration}}', ['version' => 'm141222_110026_update_ip_field', 'apply_time' => '1459260474']);
        $this->insert('{{%migration}}', ['version' => 'm141222_135246_alter_username_length', 'apply_time' => '1459260474']);
        $this->insert('{{%migration}}', ['version' => 'm141224_163110_init', 'apply_time' => '1459932606']);
        $this->insert('{{%migration}}', ['version' => 'm141225_163115_init', 'apply_time' => '1459716015']);
        $this->insert('{{%migration}}', ['version' => 'm141226_163116_init', 'apply_time' => '1459932607']);
        $this->insert('{{%migration}}', ['version' => 'm150211_094318_init', 'apply_time' => '1459713634']);
        $this->insert('{{%migration}}', ['version' => 'm150217_082719_add_default_permissions', 'apply_time' => '1459713634']);
        $this->insert('{{%migration}}', ['version' => 'm150309_153255_create_tree_manager_table', 'apply_time' => '1459597875']);
        $this->insert('{{%migration}}', ['version' => 'm150407_084217_gallery', 'apply_time' => '1459514756']);
        $this->insert('{{%migration}}', ['version' => 'm150420_075510_add_public_column', 'apply_time' => '1459713634']);
        $this->insert('{{%migration}}', ['version' => 'm150429_155009_create_page_table', 'apply_time' => '1459771026']);
        $this->insert('{{%migration}}', ['version' => 'm150528_073125_add_slider_field', 'apply_time' => '1459713635']);
        $this->insert('{{%migration}}', ['version' => 'm150614_103145_update_social_account_table', 'apply_time' => '1459260475']);
        $this->insert('{{%migration}}', ['version' => 'm150621_065345_menu', 'apply_time' => '1459932667']);
        $this->insert('{{%migration}}', ['version' => 'm150623_164544_auth_items', 'apply_time' => '1459597875']);
        $this->insert('{{%migration}}', ['version' => 'm150623_212711_fix_username_notnull', 'apply_time' => '1459260475']);
        $this->insert('{{%migration}}', ['version' => 'm150918_031100_auth_items', 'apply_time' => '1459597875']);
        $this->insert('{{%migration}}', ['version' => 'm151012_083954_initial', 'apply_time' => '1459344084']);
        $this->insert('{{%migration}}', ['version' => 'm151012_085909_initial_categories', 'apply_time' => '1459344084']);
        $this->insert('{{%migration}}', ['version' => 'm151216_173850_create_menu_table', 'apply_time' => '1459515364']);
        $this->insert('{{%migration}}', ['version' => 'm160110_222213_add_name_column', 'apply_time' => '1459932667']);
        $this->insert('{{%page}}', ['id' => '2', 'title' => 'HOME', 'alias' => 'home', 'published' => '1', 'content' => 'Телефон

HOME PAGE
', 'title_browser' => 'HOME', 'meta_keywords' => '', 'meta_description' => '', 'created_at' => '2016-04-04 06:46:39', 'updated_at' => '2016-04-05 01:05:47']);
        $this->insert('{{%profile}}', ['user_id' => '1', 'name' => '', 'public_email' => '', 'gravatar_email' => '', 'gravatar_id' => '', 'location' => '', 'website' => '', 'bio' => '']);
        $this->insert('{{%profile}}', ['user_id' => '3', 'name' => '', 'public_email' => '', 'gravatar_email' => '', 'gravatar_id' => '', 'location' => '', 'website' => '', 'bio' => '']);
        $this->insert('{{%setting}}', ['id' => '11', 'parent_id' => '0', 'code' => 'info', 'type' => 'group', 'store_range' => '', 'store_dir' => '', 'value' => '', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '21', 'parent_id' => '0', 'code' => 'basic', 'type' => 'group', 'store_range' => '', 'store_dir' => '', 'value' => '', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '31', 'parent_id' => '0', 'code' => 'smtp', 'type' => 'group', 'store_range' => '', 'store_dir' => '', 'value' => '', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '1111', 'parent_id' => '11', 'code' => 'siteName', 'type' => 'text', 'store_range' => '', 'store_dir' => '', 'value' => 'Test', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '1112', 'parent_id' => '11', 'code' => 'siteTitle', 'type' => 'text', 'store_range' => '', 'store_dir' => '', 'value' => 'Test extensions', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '1113', 'parent_id' => '11', 'code' => 'siteKeyword', 'type' => 'text', 'store_range' => '', 'store_dir' => '', 'value' => 'Your Site Keyword', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '2111', 'parent_id' => '21', 'code' => 'timezone', 'type' => 'select', 'store_range' => '-12,-11,-10,-9,-8,-7,-6,-5,-4,-3.5,-3,-2,-1,0,1,2,3,3.5,4,4.5,5,5.5,5.75,6,6.5,7,8,9,9.5,10,11,12', 'store_dir' => '', 'value' => '2', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '2112', 'parent_id' => '21', 'code' => 'commentCheck', 'type' => 'select', 'store_range' => '0,1', 'store_dir' => '', 'value' => '1', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '3111', 'parent_id' => '31', 'code' => 'smtpHost', 'type' => 'text', 'store_range' => '', 'store_dir' => '', 'value' => 'localhost', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '3112', 'parent_id' => '31', 'code' => 'smtpPort', 'type' => 'text', 'store_range' => '', 'store_dir' => '', 'value' => '', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '3113', 'parent_id' => '31', 'code' => 'smtpUser', 'type' => 'text', 'store_range' => '', 'store_dir' => '', 'value' => '', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '3114', 'parent_id' => '31', 'code' => 'smtpPassword', 'type' => 'password', 'store_range' => '', 'store_dir' => '', 'value' => '', 'sort_order' => '50']);
        $this->insert('{{%setting}}', ['id' => '3115', 'parent_id' => '31', 'code' => 'smtpMail', 'type' => 'text', 'store_range' => '', 'store_dir' => '', 'value' => '', 'sort_order' => '50']);
        $this->insert('{{%token}}', ['user_id' => '1', 'code' => '1xUzxalJpnfoEtJZSWI03P83zsboUPK4', 'created_at' => '1459334442', 'type' => '0']);
        $this->insert('{{%token}}', ['user_id' => '3', 'code' => 'QmCP3tvOLCWfumpVPurY9RVdmEmoeNxj', 'created_at' => '1459336527', 'type' => '0']);
        $this->insert('{{%user}}', ['id' => '1', 'username' => 'admin', 'email' => 'admin@localhost.local', 'password_hash' => '$2y$12$TRilOU2kcKQtNemOSfVj1ux5UsCh2W96EFOqCGSphL83fKN/QH60O', 'auth_key' => '$2y$12$TRilOU2kcKQtNemOSfVj1ux5U', 'confirmed_at' => '1459334442', 'unconfirmed_email' => '', 'blocked_at' => '', 'registration_ip' => '10.21.146.100', 'created_at' => '1459334442', 'updated_at' => '1460115896', 'flags' => '0']);
        $this->insert('{{%user}}', ['id' => '3', 'username' => 'root', 'email' => 'root@localhost.lcal', 'password_hash' => '$2y$12$u/xL5kOQLIwNS2Ant.9o..8qu6qNkLvp18szdozAieP6gPxgyzQTq', 'auth_key' => 'UA2ssqEGCRFDaaAE-XT1X9H2StvoGHRW', 'confirmed_at' => '1459422577', 'unconfirmed_email' => '', 'blocked_at' => '', 'registration_ip' => '10.21.146.100', 'created_at' => '1459336527', 'updated_at' => '1460137641', 'flags' => '0']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        echo "m160419_124214_all_tables cannot be reverted.\n";
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_assignment`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_item`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_item_child`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `auth_rule`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `block`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `gallery`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `gallery_image`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `language`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `language_source`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `language_translate`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `menu`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `migration`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `page`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `profile`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `setting`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `social_account`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `token`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `user`');
        $this->execute('SET foreign_key_checks = 1;');
        return false;
    }
    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
