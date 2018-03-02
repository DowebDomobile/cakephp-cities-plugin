<?php
namespace Dwdm\Cities\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Countries Model
 *
 * @property \Cake\ORM\Association\HasMany $Regions
 *
 * @method \Dwdm\Cities\Model\Entity\Country get($primaryKey, $options = [])
 * @method \Dwdm\Cities\Model\Entity\Country newEntity($data = null, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Country[] newEntities(array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Country|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dwdm\Cities\Model\Entity\Country patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Country[] patchEntities($entities, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Country findOrCreate($search, callable $callback = null, $options = [])
 */
class CountriesTable extends Table
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

        $this->setTable('countries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Regions', [
            'className' => RegionsTable::class,
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
}
