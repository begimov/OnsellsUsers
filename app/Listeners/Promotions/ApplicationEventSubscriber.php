<?php

namespace App\Listeners\Promotions;

use App\Events\Promotions\ApplicationCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Promotions\ApplicationCreated as ApplicationCreatedNotification;

class ApplicationEventSubscriber
{
    public function onApplicationCreated(ApplicationCreated $event) {
        $application = $event->application;
        $promotion = $application->promotion;
        $promotion->user->notify(new ApplicationCreatedNotification());
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Promotions\ApplicationCreated',
            'App\Listeners\Promotions\ApplicationEventSubscriber@onApplicationCreated'
        );
    }
}
