<?php

namespace App\Routing;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;
use Symfony\Component\DependencyInjection\Attribute\AutowireDecorated;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouterInterface;

#[AsDecorator(decorates: RouterInterface::class, priority: 500)]
class DecoratingUsingAttributesUrlGenerator implements RouterInterface
{
    public function __construct(
        #[AutowireDecorated] private RouterInterface $inner
    ) {
    }
    public function setContext(RequestContext $context)
    {
        dump('DecoratingUsingAttributesUrlGenerator setContext');
        $this->inner->setContext($context);
    }

    public function getContext(): RequestContext
    {
        dump('DecoratingUsingAttributesUrlGenerator getContext');
        return $this->inner->getContext();
    }

    public function generate(string $name, array $parameters = [], int $referenceType = self::ABSOLUTE_PATH): string
    {
        dump('DecoratingUsingAttributesUrlGenerator generate');
        return $this->inner->generate($name, $parameters, $referenceType);
    }

    public function getRouteCollection()
    {
        dump('DecoratingUsingAttributesUrlGenerator getRouteCollection');
        return $this->inner->getRouteCollection();
    }

    public function match(string $pathinfo): array
    {
        dump('DecoratingUsingAttributesUrlGenerator match');
        return $this->inner->match($pathinfo);
    }
}