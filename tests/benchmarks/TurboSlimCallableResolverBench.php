<?php
namespace TurboSlim\Benchmarks;

use TurboSlim\CallableResolver;
use TurboSlim\Container;
use TurboSlim\Benchmarks\Base\CallableResolverBenchBase;

class TurboSlimCallableResolverBench extends CallableResolverBenchBase
{
    public function __construct()
    {
        $container = new Container();
        $container['x'] = new class {
            public function method()
            {
            }
        };

        $this->x = new CallableResolver($container);

        $this->invokable = new class {
            public function __invoke()
            {
            }
        };
    }
}
