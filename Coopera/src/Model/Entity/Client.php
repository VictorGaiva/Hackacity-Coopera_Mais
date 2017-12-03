<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $telefone
 * @property string $email
 * @property string $bio
 *
 * @property \App\Model\Entity\Registration[] $registrations
 */
class Client extends Entity
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
        'nome' => true,
        'telefone' => true,
        'email' => true,
        'bio' => true,
        'registrations' => true
    ];
}
