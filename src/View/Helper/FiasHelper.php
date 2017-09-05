<?php
namespace Dwdm\Cities\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Dwdm\Cities\Model\Entity\Fias;

/**
 * Fias helper
 */
class FiasHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function format(Fias $fias)
    {
        return implode(', ', array_merge([$fias->short . '. ' . $fias->name],
            ($fias->has('area') ? [$fias->area->short . '. ' . $fias->area->name] : []),
            ($fias->has('region') ? [$fias->region->short . '. ' . $fias->region->name] : [])));
    }
}
