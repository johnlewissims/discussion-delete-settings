<?php

namespace Ejin\DiscussionDeleteSettings\Access;

use Flarum\Discussion\Discussion;
use Flarum\Settings\SettingsRepositoryInterface;
use Flarum\User\AbstractPolicy;
use Flarum\User\User;
use Illuminate\Database\Eloquent\Builder;

class DiscussionPolicy extends AbstractPolicy
{
    /**
     * {@inheritdoc}
     */
    protected $model = Discussion::class;

    /**
     * @var SettingsRepositoryInterface
     */
    protected $settings;

    /**
     * @param SettingsRepositoryInterface $settings
     */
    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param User    $actor
     * @param Discussion $discussion
     */
    public function hide(User $actor, Discussion $discussion)
    {
      $arr = [];
      foreach ($discussion->tags as $tag) {
        array_push($arr, $tag->name);
      }
      if (
        in_array("Feature Discussion", $arr)
        && $discussion->user_id == $actor->id
        && (! $discussion->hidden_at || $discussion->hidden_user_id == $actor->id)
        && $actor->can('reply', $discussion)
      ) {
        return true;
      }

    }
}
