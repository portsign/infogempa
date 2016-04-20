<?php
namespace App\Model\Table;

use App\Model\Entity\Gempa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gempa Model
 *
 */
class GempaTable extends Table
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

        $this->table('gempa');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    
        $this->hasMany('NearbyCities', [
            'foreignKey' => 'id_gempa',
            'bindingKey' => 'id_gempa'
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
        return $validator;
    }
}
