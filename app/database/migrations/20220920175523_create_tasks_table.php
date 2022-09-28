<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTasksTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('tasks');
        $table
            ->addColumn('name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('description', 'text')
            ->addColumn('done', 'boolean', [
                'default' => 0
            ])
            ->addColumn('edited_by_admin', 'boolean', [
                'default' => 0
            ])
            ->create();
    }
}
