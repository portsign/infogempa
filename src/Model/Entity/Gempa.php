<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gempa Entity.
 *
 * @property string $id
 * @property string $mag
 * @property string $place
 * @property int $time
 * @property int $updated
 * @property int $tz
 * @property string $url
 * @property string $detail
 * @property int $felt
 * @property int $cdi
 * @property int $mmi
 * @property int $alert
 * @property string $status
 * @property int $tsunami
 * @property int $sig
 * @property string $magType
 * @property string $title
 * @property string $type
 * @property string $coordinates
 * @property string $latitude
 * @property string $longitude
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 */
class Gempa extends Entity
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
        'id' => false,
    ];
}
