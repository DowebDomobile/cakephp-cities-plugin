<?php
namespace Dwdm\Cities\Controller\Api;

use Dwdm\Cities\Controller\AppController;
use Dwdm\Cities\Model\Table\CountriesTable;

/**
 * Countries Controller
 *
 * @property CountriesTable $Countries
 */
class CountriesController extends AppController
{
    use CountriesTrait;
}
