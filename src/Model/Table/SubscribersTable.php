<?php
namespace App\Model\Table;

use App\Model\Entity\Subscriber;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Entity;
use Cake\Mailer\Email;
use Cake\Event\Event;


/**
 * Subscribers Model
 *
 */
class SubscribersTable extends Table
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

        $this->table('subscribers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
    
    public function beforeSave(Event $event, EntityInterface $entity)
    {

        $email = new Email('default');
        $email->emailFormat('html');
        $email->from(['info@indocreator.co.id' => 'InfoGempa'])
            ->to($entity->email)
            ->subject('Contact Message')
            ->send('<div style="margin: auto;width: 60%;background-color: #eaeaea;padding: 10px;"><div style="width: 70%;margin: auto; padding: 14px; background-color: #FFF;box-shadow: 0px 2px 2px #888;"><img src="https://indocreator.co.id/wp-content/uploads/2016/04/logo.png" width="200"/><br/><br/><img style="margin: -14px; width: 100%;" src="https://indocreator.co.id/wp-content/uploads/2016/04/DeepinScreenshot20160401224403.png"/><p style="color:#333;">Terimakasih sudah subscribe <a href="https://infogempa.com" style="text-decoration: none;">infogempa.com</a> yang merupakan situs penyedia informasi <strong>gempa bumi dunia</strong> terupdate</p></div><center style="font-size: 10px; margin-top: 15px;">developed by <a href="https://indocreator.co.id">IndoCreator.</a></center></div></body>');      

    }
}
