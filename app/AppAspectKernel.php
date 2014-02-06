<?php
use Go\Core\AspectContainer;
use Go\Core\AspectKernel;
use Coders\Bundle\AspectBundle\Aspect\TestAspect;

/**
 * Application Aspect Kernel
 */
class AppAspectKernel extends AspectKernel
{

    /**
     * Configure an AspectContainer with advisors, aspects and pointcuts
     *
     * @param AspectContainer $container
     *
     * @return void
     */
    protected function configureAop(AspectContainer $container)
    {
        $container->registerAspect(new TestAspect(123));
    }
}