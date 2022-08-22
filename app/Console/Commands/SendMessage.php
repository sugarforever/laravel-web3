<?php

namespace App\Console\Commands;

use App\Events\MessagePushed;
use Illuminate\Console\Command;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:message {channel_id} {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send message to a specific channel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $channel_id = $this->argument('channel_id');
        $message = $this->argument('message');
        broadcast(new MessagePushed($channel_id, $message));
        return 0;
    }
}
