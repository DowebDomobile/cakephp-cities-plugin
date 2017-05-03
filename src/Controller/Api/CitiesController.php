<?php
/**
 * @copyright     Copyright (c) DowebDomobile (http://dowebdomobile.ru)
 */
namespace Dwdm\Cities\Controller\Api;

use Dwdm\Cities\Controller\AppController;
use Dwdm\Cities\Model\Table\CitiesTable;

/**
 * Cities Controller
 *
 * @property CitiesTable $Cities
 */
class CitiesController extends AppController
{
    use CitiesTrait;
}
