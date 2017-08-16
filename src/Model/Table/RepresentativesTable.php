<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Representatives Model
 *
 * @property \App\Model\Table\VendorsTable|\Cake\ORM\Association\HasMany $Vendors
 *
 * @method \App\Model\Entity\Representative get($primaryKey, $options = [])
 * @method \App\Model\Entity\Representative newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Representative[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Representative|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Representative patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Representative[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Representative findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RepresentativesTable extends Table
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

        $this->setTable('representatives');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Vendors', [
            'foreignKey' => 'representative_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        return $validator;
    }
}
