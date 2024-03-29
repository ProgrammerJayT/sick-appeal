<?php

namespace Database\Seeders;

use App\Models\ApplicationAttachment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ApplicationAttachment::factory(50)->create();
    }
}