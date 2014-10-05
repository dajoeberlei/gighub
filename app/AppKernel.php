<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    static public function createFromEnvironment()
    {
        $envFile = __DIR__ . '/../.env';

        if (!file_exists($envFile)) {
            throw new \RuntimeException("Gighub requires .env file to run.");
        }

        $envLines = file($envFile);

        foreach ($envLines as $envLine) {
            list($name, $value) = explode("=", $envLine);

            $_SERVER[trim($name)] = trim($value);
        }

        if (!isset($_SERVER['SYMFONY_ENV'])) {
            $_SERVER['SYMFONY_ENV'] = 'prod';
        }

        return new AppKernel($_SERVER['SYMFONY_ENV'], ($_SERVER['SYMFONY_ENV'] != 'prod'));
    }

    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
            new Gighub\ApplicationBundle\GighubApplicationBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
