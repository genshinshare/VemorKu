<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;

class backup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat backup database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = "Backup_Tanggal_" . Carbon::now()->format('d-m-Y') . "_Waktu_" . Carbon::now('Asia/Jakarta')->format('H-i-s') . ".sql";
        $command = "C:\\xampp\\mysql\\bin\\mysqldump.exe --user=root --password= altrak1978vemor > " . storage_path() . "/app/backup/" . $filename;
        exec($command);
        if (File::exists(storage_path("/app/backup/"))) {
            // Unggah file ke Google Drive
            Storage::disk('google')->put($filename, File::get(storage_path("/app/backup/" . $filename)));
            $this->info("Backup berhasil diunggah ke Google Drive.");
        } else {
            $this->error("Backup gagal dibuat.");
        }
    }
}
