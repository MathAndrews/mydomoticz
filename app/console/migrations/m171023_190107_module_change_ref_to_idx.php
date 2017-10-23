<?php

use yii\db\Schema;
use yii\db\Migration;

class m171023_190107_module_change_ref_to_idx extends Migration
{

    const OLD_NAME = 'ref';

    const NEW_NAME = 'idx';

    const TABLE_NAME = 'module';


    public function safeUp()
    {
        $this->renameColumn(self::TABLE_NAME, self::OLD_NAME, self::NEW_NAME);
    }

    public function safeDown()
    {
        $this->renameColumn(self::TABLE_NAME, self::NEW_NAME, self::OLD_NAME);
    }
}
