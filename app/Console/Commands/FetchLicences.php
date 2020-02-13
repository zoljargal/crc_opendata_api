<?php

namespace App\Console\Commands;

use App\Licence;
use Illuminate\Console\Command;

class FetchLicences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crc:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches licences from CRC Mongolia.';

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
        echo 'Fetching licences from CRC ' . now();
        $arrContextOptions=[
            "ssl"=>[
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ],
        ];
        $url = "https://bill.crc.gov.mn/tzlist.php?z=api&type=getTZAll";
        $data = json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)), true);

        if(!$data){
            echo '\n Error occurred during fetch data';
            return;
        }
        echo '\n fetched '. count($data) . ' licences.';
        foreach ($data as $d){
            $licence = Licence::firstOrNew(['id'=>$d['lc_id']]);
            $licence->fill((array)$d);
            $licence->save();
        }
        echo '\n done. ' . now();
    }
}
