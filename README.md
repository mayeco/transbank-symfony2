WebPay para Symfony2
==================

Módulo WebPay para Symfony2. Por el momento no es funcional.

Instalación
--------------

La Instalación es rápida. Consta de los siguientes pasos:

1. Instalar el Bundle usando Composer
2. Modificar AppKernel.php activando el Bundle
3. Editar Parámetros
4. Invocar al Checkout

### Instalar el Bundle usando Composer

``` bash
$ php composer.phar require rotvulpix/transbank-symfony2 'dev-master'
```

### Modificar AppKernel.php


``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new rotvulpix\Symfony\TransbankBundle\rotvulpixSymfonyTransbankBundle(),
    );
}
```

Prueba
--------------
```
Utilizar con cualquier fecha de expiración y CVV: 123
RUT: 11.111.111-1
Contraseña: 123

~ VISA
Nº Tarjeta: 4051885600446623
Resultado: Aprobado

~ MASTERCARD
Nº Tarjeta:￼5186059559590568
Resultado: Rechazado
```
