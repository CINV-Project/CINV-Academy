<?php

namespace Cinv\Entity;

use \Spot\EntityInterface as Entity;
use \Spot\MapperInterface as Mapper;

class User extends \Spot\Entity
{
  protected static $table = 'users';

  public static function fields()
  {
    return [
      'id' => ['type' => 'string', 'required' => true, 'primary' => true, 'unique' => true],
      'firstname' => ['type' => 'string', 'required' => true],
      'lastname' => ['type' => 'string'],
      'email' => ['type' => 'string', 'required' => true],
      'avatar' => ['type' => 'string'],
      'role' => ['type' => 'string', 'default' => 'student'],
      'completed_registration' => ['type' => 'boolean', 'default' => false],
      'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
    ];
  }

  public static function relations(Mapper $mapper, Entity $entity)
  {
    return [
      'instructors' => $mapper->hasOne($entity, 'Cinv\Entity\Instructor', 'user_id'),
    ];
  }
}
