<?php
require_once '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;  
use \Twig\Loader\FilesystemLoader;//evite de faire un " new \Twig\Loader\FilesystemLoader('../templates')" à chaque fois 
use \Twig\Environment;

$logger = new Logger('main'); //le nom logger est modifiable et main aussi 
$logger->pushHandler(new StreamHandler(__DIR__ . '/../log/app.log', Logger::DEBUG)); //le DEBUG log TOUT, il y a aussi "INFO"

$logger->info('First message');
$logger->debug('Second message');

//definir le dossier ou sont les templates
$loader = new FilesystemLoader('../templates'); 

$twig = new Environment($loader, ['cache' => '../cache']);

//affecter les variables du templates
echo $twig->render('base.html.twig',
    [
        'title' => 'Essai de Twig',
        'text'  => 'Texte inséré dans la page.',
    ]
 );
 