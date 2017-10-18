<?php

use yii\db\Schema;
use yii\db\Migration;

class m171009_115207_module extends Migration
{

    const NOT_NULL = ' NOT NULL';

    const TABLE_NAME = 'module';

    const NO_ACTION = 'NO ACTION';

    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => Schema::TYPE_PK,
            'ref' => Schema::TYPE_STRING . self::NOT_NULL,
            'name' => Schema::TYPE_STRING . self::NOT_NULL,
            'status' => Schema::TYPE_INTEGER. ' DEFAULT 0',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
