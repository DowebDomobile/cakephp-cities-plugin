<?php
namespace Dwdm\Cities\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fia Entity
 *
 * @property int $code
 * @property int $region_code
 * @property int $area_code
 * @property string $name
 * @property string $short
 * @property bool $is_locality
 */
class Fias extends Entity
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
