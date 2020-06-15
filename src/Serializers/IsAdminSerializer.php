<?php

namespace Ejin\DiscussionDeleteSettings\Serializers;

use Flarum\Api\Event\Serializing;
use Flarum\Api\Serializer\UserSerializer;
use Flarum\Api\Serializer\PostSerializer;
use Flarum\Extend\ExtenderInterface;
use Flarum\Post\Post;
use Flarum\User\AbstractPolicy;
use Flarum\User\User;
use Flarum\Extension\Extension;
use Illuminate\Contracts\Container\Container;

class IsAdminSerializer implements ExtenderInterface
{
    public function extend(Container $container, Extension $extension = null)
    {
      $container['events']->listen(Serializing::class, [$this, 'attributes']);
    }

    public function attributes(Serializing $event)
    {
      if ($event->isSerializer(UserSerializer::class)) {
        //$id = $event->model->id;
        //$user = User::where('id', $id)->group()->where('group_id', 4)->exists();
        //var_dump($user);
        //$event->attributes['IsAdmin'] = false;
      }
    }
}
