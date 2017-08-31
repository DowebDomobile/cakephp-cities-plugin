<?php
namespace Dwdm\Cities\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Regions Model
 *
 * @method \Dwdm\Cities\Model\Entity\Region get($primaryKey, $options = [])
 * @method \Dwdm\Cities\Model\Entity\Region newEntity($data = null, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Region[] newEntities(array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Region|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dwdm\Cities\Model\Entity\Region patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Region[] patchEntities($entities, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Region findOrCreate($search, callable $callback = null, $options = [])
 */
class RegionsTable extends Table
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

        $this->setTable('cities_regions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('code');

        $this->hasMany('Areas', ['foreignKey' => 'region_code']);
        $this->hasMany('Cities', ['foreignKey' => 'region_code']);
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
            ->allowEmpty('code', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('short', 'create')
            ->notEmpty('short');

        return $validator;
    }
}
