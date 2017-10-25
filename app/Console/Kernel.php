<?php

namespace Wdi\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Class Kernel
 *
 * @package Wdi\Console
 */
final class Kernel extends ConsoleKernel
{
    /** {@inheritdoc} */
    protected $commands = [];
    
    /** {@inheritdoc} */
    protected function schedule(Schedule $schedule)
    {
    }
    
    /** {@inheritdoc} */
    protected function commands()
    {
        require base_path("routes/console.php");
    }
}
