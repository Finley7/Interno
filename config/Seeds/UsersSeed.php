<?php
use Phinx\Seed\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'rocleeuwenborgh',
                'school_id' => 1,
                'password' => password_hash('rocleeuwnet', PASSWORD_BCRYPT),
                'email' => 'info@leeuwenborgh.nl',
                'primary_role' => 4,
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
