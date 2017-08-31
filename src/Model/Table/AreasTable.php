<?php
namespace Dwdm\Cities\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Areas Model
 *
 * @method \Dwdm\Cities\Model\Entity\Area get($primaryKey, $options = [])
 * @method \Dwdm\Cities\Model\Entity\Area newEntity($data = null, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Area[] newEntities(array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Area|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dwdm\Cities\Model\Entity\Area patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Area[] patchEntities($entities, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Area findOrCreate($search, callable $callback = null, $options = [])
 */
class AreasTable extends Table
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

        $this->setTable('cities_areas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('code');

        $this->hasMany('Cities', []);

        $this->belongsTo('Regions');
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
