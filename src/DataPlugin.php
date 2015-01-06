<?php namespace Prontotype\Plugins\Data;

use Prontotype\Container;

use Prontotype\Config;
use Prontotype\Plugins\ProviderInterface;
use Amu\Dayglo\Parser;
use Amu\Dayglo\Loader;
use Amu\Dayglo\ParserCollection;

class DataPlugin
{
    public function boot()
    {
        $conf = $this->container->make('prontotype.config');
        $parsers = new ParserCollection([
            new Parser\JsonParser(),
            new Parser\YamlParser(),
            new Parser\CsvParser(),
            new Parser\TomlParser(),
            new Parser\PhpParser(),
        ]);
        $this->container->share(new Loader($parsers, $conf->get('data.directory')));
    }

    public function getGlobals()
    {
        return array(
            'data' => $this->container->make('Amu\Dayglo\Loader')
        );
    }

    public function getConfig()
    {
        return array(
            'test' => 'foooo'
        );
    }
    
}