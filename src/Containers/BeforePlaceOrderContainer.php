<?php

namespace LivingSweets\Containers;

use Plenty\Plugin\Templates\Twig;

class BeforePlaceOrderContainer
{
    public function call(Twig $twig)
    {
        return $twig->render('LivingSweets::Containers.BeforePlaceOrderContainer');
    }
}