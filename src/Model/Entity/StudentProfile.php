<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentProfile Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property \Cake\I18n\Time $age
 * @property string $fullname
 * @property string $backdrop
 * @property int $updated
 * @property string $biography
 * @property string $interests
 */
class StudentProfile extends Entity
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
