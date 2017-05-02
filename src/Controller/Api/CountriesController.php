<?php
namespace Dwdm\Cities\Controller\Api;

use Dwdm\Cities\Controller\AppController;

/**
 * Countries Controller
 *
 * @property \Dwdm\Cities\Model\Table\CountriesTable $Countries
 */
class CountriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null|void
     */
    public function index()
    {
        $countries = $this->Countries->find()->all();

        $this->set(compact('countries'));
    }
}
