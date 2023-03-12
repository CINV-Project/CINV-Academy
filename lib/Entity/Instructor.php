<?php

namespace Cinv\Entity;

use \Spot\EntityInterface as Entity;
use \Spot\MapperInterface as Mapper;

class Instructor extends \Spot\Entity
{
  protected static $table = 'instructors';

  public static function fields()
  {
    return [
      'user_id' => ['type' => 'string', 'required' => true, 'primary' => true, 'unique' => true],
      'courses' => ['type' => 'array'],
      'education' => ['type' => 'string'],
      'experience' => ['type' => 'string'],
      'daysOfWeek' => ['type' => 'array'],
      'date_created' => ['type' => 'datetime', 'value' => new \DateTime()]
    ];
  }

  public static function relations(Mapper $mapper, Entity $entity)
  {
    return [
      'user' => $mapper->belongsTo($entity, 'Cinv\Entity\User', 'user_id')
    ];
  }
}
