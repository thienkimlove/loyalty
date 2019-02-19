<?php

namespace App\Console\Commands;

use App\Models\Card;
use Illuminate\Console\Command;

class GenerateCard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:card';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Card Code';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function str_random($length = 16)
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $i = 0;
        while($i < 100000) {
            try {
                $card = Card::create(['code' => $this->str_random(8)]);
                $card->code = $card->getNumber();
                $card->save();
                $i += 1;
            } catch (\Exception $e) {

            }

        }

        $this->line('Done');

    }
}
