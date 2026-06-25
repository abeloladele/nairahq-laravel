<?php
use Illuminate\Support\Facades\Artisan;
Artisan::command('nairahq:health', fn () => $this->info('NairaHQ OK'));
