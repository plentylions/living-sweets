<?php

namespace LivingSweets\Providers;

use IO\Helper\TemplateContainer;
use IO\Helper\ResourceContainer;
use Plenty\Plugin\Events\Dispatcher;
use IO\Services\ItemSearch\Helper\ResultFieldTemplate;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

/**
 * Class LivingSweetsServiceProvider
 * @package LivingSweets\Providers
 */
class LivingSweetsServiceProvider extends ServiceProvider
{
    const PRIORITY = 98;

    public function register()
    {

    }

    public function boot(Twig $twig, Dispatcher $dispatcher)
    {
        $dispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addStyleTemplate('LivingSweets::Stylesheet');
        }, self::PRIORITY);

        $dispatcher->listen( 'IO.ResultFields.*', function(ResultFieldTemplate $container) {
            $container->setTemplates([
                ResultFieldTemplate::TEMPLATE_BASKET_ITEM => 'LivingSweets::ResultFields.BasketItem' // texts.technicalData
            ]);
        }, self::PRIORITY);
    }
}

