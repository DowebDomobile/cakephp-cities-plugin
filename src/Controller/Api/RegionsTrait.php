<?php
/**
 * @copyright     Copyright (c) DowebDomobile (http://dowebdomobile.ru)
 */

namespace Dwdm\Cities\Controller\Api;

use Cake\Http\ServerRequest;
use Dwdm\Cities\Model\Table\RegionsTable;

/**
 * Trait RegionsTrait
 * @package Controller\Api
 *
 * @property RegionsTable $Regions
 * @property ServerRequest $request
 */
trait RegionsTrait
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $regions = $this->Regions->find()->where(['country_id' => $this->request->getParam('country_id')])->all();

        $this->set(compact('regions'));
    }
}