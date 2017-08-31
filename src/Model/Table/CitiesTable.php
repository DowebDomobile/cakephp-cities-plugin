<?php
namespace Dwdm\Cities\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
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

        $this->setTable('cities_cities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('code');

        $this->belongsTo('Regions', ['className' => 'Dwdm/Cities.Regions', 'foreignKey' => 'region_code']);
        $this->belongsTo('Areas', ['className' => 'Dwdm/Cities.Areas', 'foreignKey' => 'area_code']);
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
            ->requirePresence('region_code', 'create')
            ->notEmpty('region_code');

        $validator
            ->allowEmpty('area_code');

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
