<?php

include_once './bootstrap.php';

$restServer = new RestServer();

try {

    $restServer->setStatus(200);

    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    $id = $restServer->getId();
    $serverData = $restServer->getServerData();


    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPAdvClassFall2015',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );

    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);




    if ('corp' === $resource) {

        $resourceData = new CorporationResource();

        if ('GET' === $verb) {

            if (NULL === $id) {

                $restServer->setData($resourceData->getAll());
            } else {

                $restServer->setData($resourceData->get($id));
            }
        }

        if ('DELETE' === $verb) {
            if (is_null($id)) {
                throw new InvalidArgumentException('missing ID');
            } else {
                if ($resourceData->delete($id)) {
                    $restServer->setMessage('Deleted successfully');
                } else {
                    throw new InvalidArgumentException('Delete unsuccessful for id ' . $id);
                }
            }
        }

        if ('POST' === $verb) {


            if ($resourceData->post($serverData)) {
                $restServer->setMessage('Corporation Added');
                $restServer->setStatus(201);
            } else {
                throw new Exception('Corporation could not be added');
            }
        }


        if ('PUT' === $verb) {

            if (NULL === $id) {
                throw new InvalidArgumentException('Corporation ID ' . $id . ' was not found');
            } else {
                if ($resourceData->put($serverData, $id)) {
                    $restServer->setMessage('Corporation Updated');
                    $restServer->setStatus(201);
                } else {
                    throw new Exception('Corporation could not be updated');
                }
            }
        }
    } else {
        throw new InvalidArgumentException($resource . ' Resource Not Found');
        //$response['errors'] = 'Resource Not Found';
        //$status = 404;
    }
} catch (InvalidArgumentException $ex) {
    $restServer->setStatus(400);
    $restServer->setErrors($ex->getMessage());
} catch (Exception $ex) {
    $restServer->setStatus(500);
    $restServer->setErrors($ex->getMessage());
}


$restServer->outputReponse();
