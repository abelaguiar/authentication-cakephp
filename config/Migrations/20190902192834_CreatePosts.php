<?php
use Migrations\AbstractMigration;

class CreatePosts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('posts');

        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);

        $table->addColumn('image', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);

        $table->addColumn('category_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
        ->addIndex(['category_id'])
        ->addForeignKey('category_id', 'categories', ['id'], 
            ['delete' => 'SET_NULL', 'update' => 'NO_ACTION']
        );

        $table->addColumn('content', 'text', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);

        $table->create();
    }
}
