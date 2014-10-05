<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    static public function createFromEnvironment()
    {
        Dotenv::load(__DIR__ . '/..');
        Dotenv::required(array('SYMFONY_ENV', 'SYMFONY__FACEBOOK_CLIENT_ID', 'SYMFONY__FACEBOOK_CLIENT_SECRET'));

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
            new Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),
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
