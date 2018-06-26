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
        $cities = $this->Cities->find()->where(['region_id' => $this->request->getParam('region_id')])->all();

        $this->set(compact('cities'));
    }

    public function search()
    {
        $search = trim($this->request->getParam('search'));

        $q = $this->Cities->find();
        $cities = $this->Cities->find()
            ->contain(['Regions', 'Countries'])
            ->where(['Cities.name ILIKE' => "$search%"])
            ->limit(isset($this->paginate['limit']) ? $this->paginate['limit'] : 40)
            ->order([$q->func()->char_length(['Cities.name' => 'identifier'])])
            ->all();

        $this->set(compact('cities'));
    }
}