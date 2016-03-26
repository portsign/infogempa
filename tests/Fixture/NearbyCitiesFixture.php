<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NearbyCitiesFixture
 *
 */
class NearbyCitiesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 16, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'distance' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'latitude' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'direction' => ['type' => 'string', 'length' => 5, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'population' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'longitude' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 'Lorem ipsum do',
            'distance' => 1,
            'latitude' => 'Lorem ips',
            'name' => 'Lorem ipsum dolor sit amet',
            'direction' => 'Lor',
            'population' => 1,
            'longitude' => 'Lorem ips',
            'created' => '2016-03-26 08:35:22',
            'modified' => '2016-03-26 08:35:22'
        ],
    ];
}
