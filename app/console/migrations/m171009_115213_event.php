<?php

use yii\db\Schema;
use yii\db\Migration;

class m171009_115213_event extends Migration
{
    const NOT_NULL = ' NOT NULL';

    const TABLE_NAME = 'event';

    const NO_ACTION = 'NO ACTION';

    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id' => Schema::TYPE_PK,
            'module_id' => Schema::TYPE_INTEGER . self::NOT_NULL,
            'status' => Schema::TYPE_INTEGER . self::NOT_NULL . ' DEFAULT 0',
            'type' => Schema::TYPE_STRING . self::NOT_NULL,
            'date' => Schema::TYPE_DATE . self::NOT_NULL,
            'time' => Schema::TYPE_TIME . self::NOT_NULL,
            'randomness' => Schema::TYPE_STRING . self::NOT_NULL . ' DEFAULT 0',
            'command' => Schema::TYPE_STRING . self::NOT_NULL . ' DEFAULT 0',
            'days' => Schema::TYPE_TEXT . self::NOT_NULL,
        ]);

        $this->addForeignKey('fk_' . self::TABLE_NAME . '_module_id', self::TABLE_NAME, 'module_id', 'module', 'id', self::NO_ACTION, self::NO_ACTION);
    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
