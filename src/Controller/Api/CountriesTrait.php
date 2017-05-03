<?php
/**
 * @copyright     Copyright (c) DowebDomobile (http://dowebdomobile.ru)
 */

namespace Dwdm\Cities\Controller\Api;

use Dwdm\Cities\Model\Table\CountriesTable;

/**
 * Trait CountriesTrait
 * @package Controller\Api
 *
 * @property CountriesTable $Countries
 */
trait CountriesTrait
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