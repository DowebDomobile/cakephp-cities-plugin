<?php
namespace Dwdm\Cities\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Regions
 *
 * @method \Dwdm\Cities\Model\Entity\City get($primaryKey, $options = [])
 * @method \Dwdm\Cities\Model\Entity\City newEntity($data = null, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\City[] newEntities(array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\City|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dwdm\Cities\Model\Entity\City patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\City[] patchEntities($entities, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\City findOrCreate($search, callable $callback = null, $options = [])
 */
class CitiesTable extends Table
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

        $this->setTable('cities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Regions', [
            'className' => RegionsTable::class,
            'foreignKey' => 'region_id'
        ]);

        $this->belongsTo('Countries', [
            'className' => CountriesTable::class,
            'foreignKey' => 'country_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['region_id'], 'Regions'));

        return $rules;
    }
}
