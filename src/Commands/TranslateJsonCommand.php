<?php

namespace Ricadesign\TranslateJson\Commands;

use Illuminate\Console\Command;

class TranslateJsonCommand extends Command
{
    /**
         * The name and signature of the console command.
         *
         * @var string
         */
    protected $signature = 'trans:build {file} {locale=es}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create json file from csv';

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
        $csv = file_get_contents($this->argument('file'));
        $array = array_map("str_getcsv", explode("\n", $csv));

        //Array
        $output = [];
        foreach ($array as $value) {
            $output[] = $value[0] . '":"' . $value[1];
        }

        $json_output = json_encode($this->flatten($output));

        $formatted_json = str_replace(['\"', '[', ']'], ['"', '{', '}'], $json_output);
        $file = fopen("./resources/lang/".$this->argument('locale').".json", 'w');
        fwrite($file, $formatted_json);
        fclose($file);

        return self::SUCCESS;
    }

    public function flatten(array $array)
    {
        $return = [];
        array_walk_recursive($array, function ($a) use (&$return) {
            $return[] = $a;
        });

        return $return;
    }
}
