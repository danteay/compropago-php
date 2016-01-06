ComproPago, PHP API client (PHP-SDK)
==============================

## Descripción
La librería de ComproPago-PHP le permite interactuar con el API de ComproPago en su aplicación.  También cuenta con los métodos necesarios para facilitarle su desarrollo por medio de los servicios y vistas más utilizados (SDK). 

Con ComproPago puede recibir pagos en OXXO, 7Eleven y muchas tiendas más en todo México.
[Registrarse en ComproPago ] (https://compropago.com)

## Índice de Contenidos
- [Ayuda y Soporte de ComproPago] (#ayuda-y-soporte-de-compropago)
- [Requerimientos] (#requerimientos)
- [Instalación ComproPago SDK] (#instalación-compropago-sdk)
- [Documentación] (#documentación)
- [Guía básica de Uso] (#guía-básica-de-uso)
- [Guía de Versiones] (#guía-de-versiones)


## Ayuda y Soporte de ComproPago

- [Centro de ayuda y soporte](https://compropago.com/ayuda-y-soporte)
- [Solicitar Integración](https://compropago.com/integracion)
- [Guía para Empezar a usar ComproPago](https://compropago.com/ayuda-y-soporte/como-comenzar-a-usar-compropago)
- [Información de Contacto](https://compropago.com/contacto)

## Requerimientos

* [PHP >= 5.3](http://www.php.net/)
* [PHP JSON extension](http://php.net/manual/en/book.json.php)
* [PHP cURL extension](http://php.net/manual/en/book.curl.php)

## Instalación ComproPago SDK

### Instalación usando Composer

La manera recomenda de instalar la SDK de ComproPago es por medio de [Composer](http://getcomposer.org).
- [Como instalar Composer?](https://getcomposer.org/doc/00-intro.md)

Para instalar la última versión **Estable de la SDK**, ejecuta el comando de Composer:

```bash
composer require compropago/php-sdk
```

O agregando manualmente al archivo composer.json
```bash
"require": { 
		"compropago/php-sdk":"^1.0"
	}
```
```bash
composer install
```

Después de la instalación para poder hacer uso de la librería es **necesario incluir** el autoloader de Composer:

```php
require 'vendor/autoload.php';
```

Para actualizar el SDK de ComproPago a la última versión estable ejecutar:

 ```bash
composer update
 ```
### Instalación descargando archivo ZIP

Descargar y descomprimir el archivo de la versión a utilizar:
- [v.1.0.1] (http://ec2-54-153-109-209.us-west-1.compute.amazonaws.com/compropago-php-sdk-1-0-1.zip) Última Estable

Para poder hacer uso de la librería es **necesario incluir** el autoloader que se encuentra dentro de la carpeta **vendor** del archivo que descomprimió:
```php
require 'vendor/autoload.php';
```
###Instalación por GitHub

Puede descargar alguna de las versiones que hemos publicado:
- [Consultar Versiones Publicadas en GitHub](https://github.com/compropago/compropago-php/releases)

O si o lo desea puede obtener el repositorio
 ```bash
 #Última Versión estable
git clone -b 1.0.1 https://github.com/compropago/compropago-php.git

 #repositorio en su estado actual (*puede no ser versón estable*)
git clone https://github.com/compropago/compropago-php.git
 ```
 Para poder hacer uso de la librería es necesario que incluya **Todos** los archivos contenidos en la carpeta **src/Compropago** 
 
## Documentación


## Guía básica de Uso
Se debe contar con una cuenta activa de ComproPago. [Registrarse en ComproPago ] (https://compropago.com)

### General

Para poder hacer uso de la librería es necesario incluir el autoloader 
```php
require 'vendor/autoload.php';
```
El Namespace a utilizar dentro de la librería es **Compropago**.
```php
use Compropago\Client; //Configuración de datos de conexión
use Compropago\Service; //Llamados al API
use Compropago\Controllers\Views;  //Inclusión de vistas, ej. Mostrar template de las tiendas donde pagar
```
Los Namespaces para los métodos se pueden ocupar a su conveniencia. Para mayor información consulte la [documentación de PHP acerca de Namespaces] (http://php.net/manual/en/language.namespaces.basics.php) . ej:
```php
/* Unqualified name */
use Compropago\Client; 
$compropagoClient= new Client($compropagoConfig);
/* Fully qualified name */
$compropagoClient= new Compropago\Client($compropagoConfig);
```
### Configuración del Cliente 
Para poder hacer llamados al API es necesario que primero configure sus Llaves de conexión y crear un instancia de Client.
*Sus llaves las encontrara en su Panel de ComproPago en el menú Configuración.* [Consulte Aquí sus Llaves] (https://compropago.com/panel/configuracion) 

```php
$compropagoConfig= array(
				//Llave pública
				'publickey'=>'pk_test_TULLAVEPUBLICA',
				//Llave privada 
				'privatekey'=>'sk_test_TULLAVE PRIVADA',
				//Esta probando?, descomente la siguiente línea y utilice sus llaves de Modo Pruebas
				//'live'=>false
		);
// Instancia del Client
$compropagoClient= new Compropago\Client($compropagoConfig);
```
### Llamados al los servicios del API 
Para utilizar los métodos se necesita tener una instancia de Service. La cual recibe de parámetro el objeto de Client. 
```php
$compropagoService= new Compropago\Service($compropagoClient);
```
### Métodos base del API
**Crear una nueva orden de Pago**
```php
//Campos Obligatorios para poder realizar una nueva orden
$data = array(
		'order_id'    	     => 'testorderid',             // string para identificar la orden
		'order_price'        => '123.45',                  // float con el monto de la operación
		'order_name'         => 'Test Order Name',         // nombre para la orden
		'customer_name'      => 'Compropago Test',         // nombre del cliente
		'customer_email'     => 'test@compropago.com',     // email del cliente
		'payment_type'       => 'OXXO'                     // identificador de la tienda donde realizar el pago
);
//Obtenemos el JSON de la respuesta 
$response = $compropagoService->placeOrder($data);

```

## Guía de Versiones

| Version | Status      | Packagist            | Namespace    | Repo                      | Docs                      | 
|---------|-------------|----------------------|--------------|---------------------------|---------------------------|
| 1.0.x   | Latest      | `compropago/php-sdk` | `Compropago` | [v1.0.x][compropago-repo] | [v1][compropago-1-docs]   | 

[compropago-repo]: https://github.com/compropago/compropago-php
[compropago-1-docs]: https://compropago.com/documentacion/api
