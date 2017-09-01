<?php
/**
 * @copyright     Copyright (c) DowebDomobile (http://dowebdomobile.ru)
 */

namespace Dwdm\Cities\Controller\Api;

use Cake\Http\ServerRequest;
use Dwdm\Cities\Model\Table\CitiesTable;

/**
 * Trait CitiesTrait
 * @package Controller\Api
 *
 * @property CitiesTable $Cities
 * @property ServerRequest $request
 */
trait CitiesTrait
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cities = $this->Cities->find()->where(['region_code' => $this->request->getParam('region_code')])->all();

        $this->set(compact('cities'));
    }

    public function search($city, $search)
    {
        $cities = $this->loadModel('Dwdm/Cities.Fias')
            ->find()
            ->contain(['Region', 'Area'])
            ->where(($city == 1 ? ['Fias.is_locality' => true] : []) + ['Fias.name ILIKE' => "%$search%"])
            ->limit(isset($this->paginate['limit']) ? $this->paginate['limit'] : 100)
            ->all();

        $this->set(compact('cities'));
    }
}