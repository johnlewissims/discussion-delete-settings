<?php

/*
 * This file is part of ejin/discussion-delete-settings.
 *
 * Copyright (c) 2020 John Lewis Sims.
 *
 * For the full copyright and license informati on, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Ejin\DiscussionDeleteSettings;

use Flarum\Extend;
use Illuminate\Contracts\Events\Dispatcher;
use Flarum\Api\Event\Serializing;
use Ejin\DiscussionDeleteSettings\Serializers\IsAdminSerializer;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less'),
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/resources/less/admin.less'),
    new Extend\Locales(__DIR__ . '/resources/locale'),
    function (Dispatcher $events) {
        $events->subscribe(Access\DiscussionPolicy::class);
    },
    new IsAdminSerializer(),
];
