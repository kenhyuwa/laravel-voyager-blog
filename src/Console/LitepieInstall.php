<?php

namespace Ken\Blog\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Illuminate\Filesystem\Filesystem;
use Ken\Blog\LitepieServiceProvider;
use TCG\Voyager\Traits\Seedable;
use Ken\Blog\Traits\LiteSeed;

class LitepieInstall extends Command
{
    use Seedable, LiteSeed;
    protected $seedersPath = 'vendor/tcg/voyager/publishable/database/seeds';
    protected $litepieSeed = 'vendor/ken/laravel-voyager-blog/database/seeds';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'litepieweb:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Litepie blog preparing to Installation';

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'example.stub' => 'example.blade.php',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    protected function findComposer()
    {
        if (file_exists(getcwd().'/composer.phar')) {
            return '"'.PHP_BINARY.'" '.getcwd().'/composer.phar';
        }

        return 'composer';
    }

    public function fire(Filesystem $filesystem)
    {
        $this->handle($filesystem);
    }

    public function handle(Filesystem $filesystem)
    {
        $this->info('Installation Voyager Packages Admin');
        $this->call('voyager:install');

        $this->info('Publishing example page to views');
        $this->exportExample();

        $this->info('Publishing the assets, and config files');
        $this->call('vendor:publish', ['--provider' => LitepieServiceProvider::class]);

        $this->info('Replace namespace from RouteServiceProvider');
        if (file_exists(app_path('Providers/RouteServiceProvider.php'))) {
            $files = file_get_contents(app_path('Providers/RouteServiceProvider.php'));
            if ($files !== false) {
                $files = str_replace(
                    'App\Http\Controllers', 
                    "", 
                    $files
                );
                file_put_contents(
                    app_path('Providers/RouteServiceProvider.php'),
                     $files
                 );
            }
        } else {
            $this->warn('Unable to locate "app/Providers/RouteServiceProvider.php".  Did you move this file?');
            $this->warn('You need to update this manually.  Change $protected = "App\Http\Controllers" to $protected = "" in app/Providers/RouteServiceProvider.php');
        }

        $composer = $this->findComposer();

        $process = new Process($composer.' dump-autoload');
        $process->setWorkingDirectory(base_path())->run();

        $this->info('Replace Route in routes/web.php');
        $routes_contents = $filesystem->get(base_path('routes/web.php'));
        if(false === strpos($routes_contents, 'Litepie::routes()')){
            $filesystem->append(
                base_path('routes/web.php'),
                "Litepie::routes();"
            );
        }

        $this->info('Replace config from Voyager');
        $config = file_get_contents(base_path('config/voyager.php'));
        if($config != false){
            $config = str_replace(
                "'prefix' => 'admin',",
                "'prefix' => env('LITEPIE_PREFIX'),",
                $config
            );
            file_put_contents(
                base_path('config/voyager.php'),
                 $config
             );
        }

        $this->info('Seeding data into the database');
        $this->seed('VoyagerDummyDatabaseSeeder');
        $this->litepieSeed('LitepieSeeder');

        $this->info('Litepie Blog Installed successfully and Enjoy!.');

    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportExample()
    {
        foreach ($this->views as $key => $value) {
            if (file_exists($view = resource_path('views/'.$value))) {
                if (! $this->confirm("The [{$value}] view already exists. Do you want to replace it?")) {
                    continue;
                }
            }

            copy(
                __DIR__.'/stubs/make/views/'.$key,
                $view
            );
        }
    }
}
