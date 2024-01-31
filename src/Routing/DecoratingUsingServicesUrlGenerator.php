<?php

namespace App\Routing;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouterInterface;


class DecoratingUsingServicesUrlGenerator implements RouterInterface
{
    public function __construct(
        private readonly RouterInterface $inner
    ) {
    }
    public function setContext(RequestContext $context)
    {
        dump('DecoratingUsingServicesUrlGenerator setContext');
        $this->inner->setContext($context);
    }

    public function getContext(): RequestContext
    {
        dump('DecoratingUsingServicesUrlGenerator  getContext');
        return $this->inner->getContext();
    }

    public function generate(string $name, array $parameters = [], int $referenceType = self::ABSOLUTE_PATH): string
    {
        dump('DecoratingUsingServicesUrlGenerator  generate');
        return $this->inner->generate($name, $parameters, $referenceType);
    }

    public function getRouteCollection()
    {
        dump('DecoratingUsingServicesUrlGenerator getRouteCollection');
        return $this->inner->getRouteCollection();
    }

    public function match(string $pathinfo): array
    {
        dump('DecoratingUsingServicesUrlGenerator match');
        return $this->inner->match($pathinfo);
    }
}