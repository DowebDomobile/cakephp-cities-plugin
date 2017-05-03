<?php
namespace Dwdm\Cities\Controller\Api;

use Dwdm\Cities\Controller\AppController;
use Dwdm\Cities\Model\Table\RegionsTable;

/**
 * Regions Controller
 *
 * @property RegionsTable $Regions
 */
class RegionsController extends AppController
{
    use RegionsTrait;
}
