<?php
namespace Dwdm\Cities\Model\Entity;

use Cake\ORM\Entity;

/**
 * Area Entity
 *
 * @property string $region_code
 * @property string $code
 * @property string $name
 * @property string $short
 */
class Area extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'code' => false
    ];
}
