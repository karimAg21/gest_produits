<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\SupprimerProduitsFaibleQuantite::class,
        // Ajoutez d'autres commandes ici si nécessaire
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Exemple : exécuter la commande tous les jours à minuit
        $schedule->command('produits:supprimer-faible-quantite')
                 ->dailyAt('00:00');
        
        // Vous pouvez aussi ajouter d'autres tâches planifiées ici
        // $schedule->command('autre:commande')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}