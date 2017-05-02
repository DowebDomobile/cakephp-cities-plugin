<?php
namespace Dwdm\Cities\Controller\Api;

use Dwdm\Cities\Controller\AppController;

/**
 * Regions Controller
 *
 * @property \Dwdm\Cities\Model\Table\RegionsTable $Regions
 */
class RegionsController extends AppController
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
