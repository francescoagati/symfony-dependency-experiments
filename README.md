symfony-dependency-experiments
==============================

```

services:
  app:
    class:     App
    arguments: [@Logger,@Rest,@Twig_enviroment]
  proxy:
    class:     Proxy
    arguments: [@Curl]
  curl:
    class:     Curl
  logger:
    class:     Monolog\Logger
    arguments: ["pippa"]
    calls:
      - [pushHandler, [@stream_handler]]
  stream_handler:
    class:     Monolog\Handler\StreamHandler
    arguments: ["pippa.log",Logger::WARNING] 
  rest:
    class: Resty
    calls:
      - [setBaseURL, ['https://gimmebar.com/api/v1']]
  twig_loader_string:
    class: Twig_Loader_String
  twig_loader_filesystem:
    class: Twig_Loader_Filesystem
    arguments: ['templates']
  twig_enviroment:
    class: Twig_Environment
    arguments: [@Twig_loader_filesystem]

```