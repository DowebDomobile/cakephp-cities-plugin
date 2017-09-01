<?php
namespace Dwdm\Cities\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Dwdm\Cities\Model\Entity\Fias;

/**
 * Fias Model
 *
 * @method \Dwdm\Cities\Model\Entity\Fia get($primaryKey, $options = [])
 * @method \Dwdm\Cities\Model\Entity\Fia newEntity($data = null, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Fia[] newEntities(array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Fia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Dwdm\Cities\Model\Entity\Fia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Fia[] patchEntities($entities, array $data, array $options = [])
 * @method \Dwdm\Cities\Model\Entity\Fia findOrCreate($search, callable $callback = null, $options = [])
 */
class FiasTable extends Table
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

        $this->setEntityClass(Fias::class);
        $this->setTable('fias');
        $this->setDisplayField('name');
        $this->setPrimaryKey('code');

        $this->belongsTo('Region', ['className' => self::class, 'foreignKey' => 'region_code']);
        $this->belongsTo('Area', ['className' => self::class, 'foreignKey' => 'area_code']);
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
            ->integer('code')
            ->allowEmpty('code', 'create');

        $validator
            ->integer('region_code')
            ->allowEmpty('region_code');

        $validator
            ->integer('area_code')
            ->allowEmpty('area_code');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('short', 'create')
            ->notEmpty('short');

        $validator
            ->boolean('is_locality')
            ->requirePresence('is_locality', 'create')
            ->notEmpty('is_locality');

        return $validator;
    }
}
