<?php namespace Prontotype\Plugins\Data;

class Plugin 
{
    public function getProviders()
    {
        return array(
            'Prontotype\Plugins\Data\Providers\DataProvider'
        );
    }
}