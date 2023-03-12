<?php

namespace Cinv\Api;

use phpDocumentor\Reflection\Types\Boolean;

class Server
{
  public $user;

  public function __construct()
  {
    $this->user = new UserServer();
  }
}

class UserServer
{
  public function login($user)
  {
    $response = ['status' => 'success',  'is_registered' => false,  'role' => 'student', 'id' => $user->sub];

    try {
      validate_google_user($user->access_token, $user->sub);
      $userMapper = db()->mapper('Cinv\Entity\User');
      $response['access_token'] = $user->access_token;
      $where_id = ['id' => $user->sub];
      $userEntity = $userMapper->first($where_id);

      $user_data = [
        'id' => $user->sub,
        'firstname' => $user->given_name,
        'lastname' => $user->family_name,
        'email' => $user->email,
        'avatar' => $user->picture
      ];

      if (!$userEntity) {
        $userMapper->insert($user_data);
      } else {
        $response['is_registered'] = !!$userEntity->completed_registration;
        $response['role'] = $userEntity->role;
        $userMapper->update($userMapper->build($user_data), $where_id);
      }

      set_session_data($user_data);
    } catch (\Exception $e) {
      $response =  json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }

    return json_encode($response);
  }


  public function update($user, $id)
  {
    try {
      $where_id = ['id' => $id];
      $userMapper = db()->mapper('Cinv\Entity\User');
      $userEntity = $userMapper->first($where_id);
      if (!$userEntity) {
        throw new \Exception("Could not update User. Not found");
      }

      $userEntity->data($user);
      $result = $userMapper->update($userEntity);
      if (!$result) {
        throw new \Exception("Could not update User");
      }

      $response = ['status' => 'success'];
    } catch (\Exception $e) {
      $response =  json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }

    return json_encode($response);
  }

  public function createInstructor($instructor, $user_id)
  {
    try {
      $userMapper = db()->mapper('Cinv\Entity\Instructor');
      $where_id = ['user_id' => $user_id];
      $instructor->user_id = $user_id;
      $entity = $userMapper->upsert((array)$instructor, $where_id);
      if (!$entity->user_id) {
        throw new \Exception("Could not update Instructor");
      }

      $response = ['status' => 'success'];
    } catch (\Exception $e) {
      $response =  json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }

    return json_encode($response);
  }
}
