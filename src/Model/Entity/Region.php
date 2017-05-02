<?php
namespace Dwdm\Cities\Model\Entity;

use Cake\ORM\Entity;

/**
 * Region Entity
 *
 * @property int $id
 * @property int $country_id
 * @property string $name
 *
 * @property \Dwdm\Cities\Model\Entity\Country $country
 * @property \Dwdm\Cities\Model\Entity\City[] $cities
 */
class Region extends Entity
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
        'id' => false
    ];
}
