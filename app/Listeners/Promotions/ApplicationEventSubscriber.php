<?php

namespace App\Listeners\Promotions;

use App\Events\Promotions\ApplicationCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationEventSubscriber
{
    public function onApplicationCreated(ApplicationCreated $event) {
        $application = $event->application;
        dd($application);
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
