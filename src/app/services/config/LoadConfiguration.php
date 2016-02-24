<?php

namespace Tourism\services\config;

use Illuminate\Config\Repository;
use Interop\Container\ContainerInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Contracts\Config\Repository as RepositoryContract;

class LoadConfiguration
{
    /**
     * Bootstrap the given application.
     *
     * @param ContainerInterface $app
     */
    public function bootstrap(ContainerInterface $app)
    {
        $items = [];
        $app['config'] = $config = new Repository($items);
        $this->loadConfigurationFiles($config);
        date_default_timezone_set($config['app.timezone']);
        mb_internal_encoding('UTF-8');
    }

    /**
     * Load the configuration items from all of the files.
     *
     * @param  \Illuminate\Contracts\Config\Repository $repository
     */
    protected function loadConfigurationFiles(RepositoryContract $repository)
    {
        foreach ($this->getConfigurationFiles() as $key => $path) {
            $repository->set($key, require $path);
        }
    }

    /**
     * Get all of the configuration files for the application.
     *
     * @return array
     */
    protected function getConfigurationFiles()
    {
        $files = [];
        $confPath = CONFIG_DIRECTORY;
        foreach (Finder::create()->files()->name('*.php')->in($confPath) as $file) {

            $files[basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        return $files;
    }

    /**
     * Get the configuration file nesting path.
     *
     * @param  \Symfony\Component\Finder\SplFileInfo  $file
     * @param  string  $configPath
     * @return string
     */
    protected function getConfigurationNesting(SplFileInfo $file, $configPath)
    {
        $directory = dirname($file->getRealPath());

        if ($tree = trim(str_replace($configPath, '', $directory), DIRECTORY_SEPARATOR)) {
            $tree = str_replace(DIRECTORY_SEPARATOR, '.', $tree).'.';
        }

        return $tree;
    }
}
