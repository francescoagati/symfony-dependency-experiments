<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class App
{
    private $proxy;

    public function __construct(Monolog\Logger $logger, Resty $rest, Twig_Environment $render)
    {
        echo "App::__construct\n";
        $this->proxy = $proxy;
        $this->logger= $logger;
        $this->rest=$rest;
        $this->render=$render;
    }

    public function hello()
    {
        $this->logger->addWarning('Foo');
        $this->logger->addError('Bar');
        
        return $this->render->render('prova.twig', array('name' => 'Fabien'));;
    }
}





include __DIR__ . "/vendor/autoload.php";

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;



function getContainer($yaml_file) {
  
  $file = __DIR__ .'/cache/'.(split("\.",$yaml_file)[0]).'.php';
  if (file_exists($file)) {
      require_once $file;
      $container = new ProjectServiceContainer();
  } else {

      $container = new ContainerBuilder();
      $loader = new YamlFileLoader($container, new FileLocator(__DIR__));
      $loader->load($yaml_file);
      $container->compile();
      $dumper = new PhpDumper($container);
      echo $file;
      file_put_contents($file, $dumper->dump());

  }
  return $container;
}






echo getContainer("services.yml")->get('app')->hello();




