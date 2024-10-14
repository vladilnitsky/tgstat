<?php

use yii\db\Migration;

/**
 * Class m241014_024832_init
 */
class m241014_024832_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable('short_url', [
            'id'   => $this->primaryKey(),
            'hash' => $this->char(5)->notNull()->unique(),
            'url'  => $this->string(1024)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropTable('short_url');
    }
}
