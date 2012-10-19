<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * ProjectServiceContainer
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class ProjectServiceContainer extends Container
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();

        $this->set('service_container', $this);

        $this->scopes = array();
        $this->scopeChildren = array();
    }

    /**
     * Gets the 'app' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return App A App instance.
     */
    protected function getAppService()
    {
        return $this->services['app'] = new \App($this->get('proxy'));
    }

    /**
     * Gets the 'curl' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Curl A Curl instance.
     */
    protected function getCurlService()
    {
        return $this->services['curl'] = new \Curl();
    }

    /**
     * Gets the 'proxy' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return Proxy A Proxy instance.
     */
    protected function getProxyService()
    {
        return $this->services['proxy'] = new \Proxy($this->get('curl'));
    }
}
