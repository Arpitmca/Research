<?php

namespace App\Console\Commands\Views;

use Illuminate\Console\Command;

class BuildGeneralSubPageView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:gppview  {path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Building a general partial view.';

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
     * @return mixed
     */
    public function handle()
    {
        if (isset(explode("=", $this->argument('path'))[1])) {
            $path = explode("=", $this->argument('path'))[1];
        } else {
            $path = $this->argument('path');
        }
        $path = base_path("resources" . DIRECTORY_SEPARATOR ."views") . DIRECTORY_SEPARATOR . str_replace(".", DIRECTORY_SEPARATOR  , $path) . ".blade.php";

        

        $dir = str_replace(last(explode("\\", $path)), "", $path);
        if (!is_dir($dir)) {
            mkdir($dir,0777, true);
        }


        if (file_exists($path)) {
            $this->error("File Already Exists.");
            return 1;
        }
        file_put_contents($path, file_get_contents(base_path("resources" . DIRECTORY_SEPARATOR ."views") . DIRECTORY_SEPARATOR . "layouts" .DIRECTORY_SEPARATOR. "gppview.blade.php" ));
        $this->info("Created: " . $path);
        return 0;
    }
}
