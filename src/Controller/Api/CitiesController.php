<?php
namespace Dwdm\Cities\Controller\Api;

use Dwdm\Cities\Controller\AppController;

/**
 * Cities Controller
 *
 * @property \Dwdm\Cities\Model\Table\CitiesTable $Cities
 */
class CitiesController extends AppController
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
