<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 06.02.14
 * Time: 00:34
 */

namespace Coders\Bundle\AspectBundle\Aspect;

use Go\Aop\Aspect;
use Go\Core\AspectKernel;
use Go\Aop\Intercept\FieldAccess;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\Around;
use Go\Lang\Annotation\Pointcut;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Debug\DebugClassLoader;

/**
 * Test aspect
 */
class TestAspect implements Aspect
{
    public function __construct()
    {
        ob_start();
        DebugClassLoader::disable();
    }

    public function __destruct()
    {
        if (ob_get_level()) {
            ob_end_flush();
        }
    }

    /**
     * Method that should be called before real method
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("within(Repository+)")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        $obj = $invocation->getThis();
        throw new Exception("Fuck");
        echo 'Calling Before Interceptor for method: ',
        is_object($obj) ? get_class($obj) : $obj,
        $invocation->getMethod()->isStatic() ? '::' : '->',
        $invocation->getMethod()->getName(),
        '()',
        "<br>\n";
    }
}