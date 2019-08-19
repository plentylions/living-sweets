<?php

namespace LivingSweets\Providers;

use IO\Helper\TemplateContainer;
use IO\Helper\ResourceContainer;
use Plenty\Plugin\Events\Dispatcher;
use IO\Services\ItemSearch\Helper\ResultFieldTemplate;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\ComponentContainer;

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

        $dispatcher->listen('IO.Component.Import', function (ComponentContainer $componentContainer)
        {
            if($componentContainer->getOriginComponentTemplate() == 'Ceres::Basket.Components.BasketPreview'){
                $componentContainer->setNewComponentTemplate('LivingSweets::Basket.Components.BasketPreview');
            }
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.basket', function (TemplateContainer $container)
        {
            $container->setTemplate('LivingSweets::Basket.Basket');
        }, self::PRIORITY);

        $dispatcher->listen( 'IO.ResultFields.*', function(ResultFieldTemplate $container) {
            $container->setTemplates([
                ResultFieldTemplate::TEMPLATE_BASKET_ITEM => 'LivingSweets::ResultFields.BasketItem' // texts.technicalData
            ]);
        }, self::PRIORITY);
    }
}

