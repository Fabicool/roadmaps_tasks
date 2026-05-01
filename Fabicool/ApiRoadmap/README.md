# Mage2 Module Fabicool ApiRoadmap

    ``fabicool/module-apiroadmap``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
roadmap 15-03-2026

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Fabicool`
 - Enable the module by running `php bin/magento module:enable Fabicool_ApiRoadmap`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require fabicool/module-apiroadmap`
 - enable the module by running `php bin/magento module:enable Fabicool_ApiRoadmap`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - API Endpoint
	- GET - Fabicool\ApiRoadmap\Api\BestsellersManagementInterface > Fabicool\ApiRoadmap\Model\BestsellersManagement

 - API Endpoint
	- GET - Fabicool\ApiRoadmap\Api\NewManagementInterface > Fabicool\ApiRoadmap\Model\NewManagement

 - API Endpoint
	- GET - Fabicool\ApiRoadmap\Api\TreeManagementInterface > Fabicool\ApiRoadmap\Model\TreeManagement

 - API Endpoint
	- POST - Fabicool\ApiRoadmap\Api\SubscribeManagementInterface > Fabicool\ApiRoadmap\Model\SubscribeManagement


## Attributes



