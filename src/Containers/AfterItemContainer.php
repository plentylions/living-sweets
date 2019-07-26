<?php

namespace LivingSweets\Containers;

use Plenty\Plugin\Templates\Twig;

class AfterItemContainer
{
    public function call(Twig $twig)
    {
        return $twig->render('LivingSweets::Containers.AfterItemContainer');
    }
}