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
        $search = $this->request->getParam('search');

        $cities = $this->Cities->find()
            ->contain(['Regions'])
            ->where(['Cities.name ILIKE' => "$search%"])
            ->limit(isset($this->paginate['limit']) ? $this->paginate['limit'] : 40)
            ->all();

        $this->set(compact('cities'));
    }
}