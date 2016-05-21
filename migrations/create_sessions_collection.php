<?php


use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * The name of the database connection to use.
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection($this->connection)->create('sessions', function (Blueprint $collection) {
            
            $collection->unique('id');
            $collection->index('user_id');
            $collection->index('ip_address');
            $collection->index('user_agent');
            $collection->index('payload');
            $collection->index('last_activity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)->table('sessions', function(Blueprint $collection)
		{
			$collection->dropIndex('test');
		});
    }
}