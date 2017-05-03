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
}