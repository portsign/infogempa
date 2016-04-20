<?php
namespace App\Model\Table;

use App\Model\Entity\NearbyCity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NearbyCities Model
 *
 */
class NearbyCitiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('nearby_cities');
        $this->displayField('name');

        $this->addBehavior('Timestamp');
        $this->belongsTo('Gempa', [
            'className' => 'Gempa',
            'foreignKey' => 'id_gempa'
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        // $validator
        //     ->requirePresence('id', 'create')
        //     ->notEmpty('id');

        // $validator
        //     ->integer('distance')
        //     ->requirePresence('distance', 'create')
        //     ->notEmpty('distance');

        // $validator
        //     ->requirePresence('latitude', 'create')
        //     ->notEmpty('latitude');

        // $validator
        //     ->requirePresence('name', 'create')
        //     ->notEmpty('name');

        // $validator
        //     ->requirePresence('direction', 'create')
        //     ->notEmpty('direction');

        // $validator
        //     ->integer('population')
        //     ->requirePresence('population', 'create')
        //     ->notEmpty('population');

        // $validator
        //     ->requirePresence('longitude', 'create')
        //     ->notEmpty('longitude');

        return $validator;
    }
}
