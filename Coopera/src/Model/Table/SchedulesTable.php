<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \App\Model\Table\RegistrationsTable|\Cake\ORM\Association\HasMany $Registrations
 *
 * @method \App\Model\Entity\Schedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Schedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Schedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Schedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule findOrCreate($search, callable $callback = null, $options = [])
 */
class SchedulesTable extends Table
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

        $this->setTable('schedules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Registrations', [
            'foreignKey' => 'schedule_id'
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
        $validator
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('dia_data_semana')
            ->requirePresence('dia_data_semana', 'create')
            ->notEmpty('dia_data_semana');

        $validator
            ->numeric('hora')
            ->requirePresence('hora', 'create')
            ->notEmpty('hora');

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
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
