<?php

namespace App\Console\Commands;

use App\Services\VkApiService;
use Illuminate\Console\Command;

class VkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vk:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импорт пользователей из VK';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $vk = new VkApiService();
        $vk->friends();

        return 0;
    }
}
