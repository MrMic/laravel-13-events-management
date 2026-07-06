<?php

namespace App\Console\Commands;

use App\Models\Attendee;
use App\Models\Event;
use App\Notifications\EventReminderNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Str;

/** @package App\Console\Commands */
#[Signature('app:send-event-reminders')]
#[Description("Send notifications to all event's attendees that event starts soon")]
class SendEventReminders extends Command implements ShouldQueue
{
    use Queueable;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $events = Event::with('attendees.user')
            ->whereBetween('start_time', [now(), now()->addDay()])
            ->get();

        $eventCount = $events->count();
        $eventLabel = Str::plural('event', $eventCount);

        $this->info("Found {$eventCount} {$eventLabel}.");

        $events->each(
            fn ($event) => $event->attendees->each(
                fn (Attendee $attendee) => $attendee->user->notify(new EventReminderNotification($event))
            )
        );

        $this->info("Reminder notifications sent successfully at " . date("Y-m-d H:i:s"));
    }
}
