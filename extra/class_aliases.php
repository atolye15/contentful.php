<?php

/**
 * This file is part of the contentful/contentful package.
 *
 * @copyright 2015-2019 Contentful GmbH
 * @license   MIT
 */

declare(strict_types=1);

/**
 * Version 3 of the SDK moves some classes to a different location.
 * This file provides an easy drop-in compatibility layer which allows you
 * to not having to worry about renaming all classes.
 * Bear in mind, this is *not* the recommended approach.
 * A simple search/replace in your project should be enough to adapt to the new changes.
 * If for whatever reason you don't want to do that, you can include this file
 * in the "autoload" section of your composer.json file.
 *
 * {
 *     // ...
 *     "autoload": {
 *         // ...
 *         "files": ["vendor/contentful/contentful/extra/class_aliases.php"],
 *     }
 * }
 *
 * This file will stay the same throughout the lifecycle of a major version,
 * but its contents could be modified any time a new major version is released
 * and possibly new changes are necessary.
 */
$classes = [
    'Atolye15\\Exception\\AccessTokenInvalidException' => 'Atolye15\\Core\\Exception\\AccessTokenInvalidException',
    'Atolye15\\Exception\\ApiException' => 'Atolye15\\Core\\Api\\Exception',
    'Atolye15\\Exception\\BadRequestException' => 'Atolye15\\Core\\Exception\\BadRequestException',
    'Atolye15\\Exception\\InvalidQueryException' => 'Atolye15\\Core\\Exception\\InvalidQueryException',
    'Atolye15\\Exception\\NotFoundException' => 'Atolye15\\Core\\Exception\\NotFoundException',
    'Atolye15\\Exception\\RateLimitExceededException' => 'Atolye15\\Core\\Exception\\RateLimitExceededException',
    'Atolye15\\File\\File' => 'Atolye15\\Core\\File\\File',
    'Atolye15\\File\\FileInterface' => 'Atolye15\\Core\\File\\FileInterface',
    'Atolye15\\File\\ImageFile' => 'Atolye15\\Core\\File\\ImageFile',
    'Atolye15\\File\\ImageOptions' => 'Atolye15\\Core\\File\\ImageOptions',
    'Atolye15\\File\\LocalUploadFile' => 'Atolye15\\Core\\File\\LocalUploadFile',
    'Atolye15\\File\\RemoteUploadFile' => 'Atolye15\\Core\\File\\RemoteUploadFile',
    'Atolye15\\File\\UnprocessedFileInterface' => 'Atolye15\\Core\\File\\UnprocessedFileInterface',
    'Atolye15\\Link' => 'Atolye15\\Core\\Api\\Link',
    'Atolye15\\Location' => 'Atolye15\\Core\\Api\\Location',
    'Atolye15\\ResourceArray' => 'Atolye15\\Core\\Resource\\ResourceArray',
    'Atolye15\\Delivery\\Asset' => 'Atolye15\\Delivery\\Resource\\Asset',
    'Atolye15\\Delivery\\ContentType' => 'Atolye15\\Delivery\\Resource\\ContentType',
    'Atolye15\\Delivery\\ContentTypeField' => 'Atolye15\\Delivery\\Resource\\ContentType\\Field',
    'Atolye15\\Delivery\\DynamicEntry' => 'Atolye15\\Delivery\\Resource\\Entry',
    'Atolye15\\Delivery\\Space' => 'Atolye15\\Delivery\\Resource\\Space',
    'Atolye15\\Delivery\\Locale' => 'Atolye15\\Delivery\\Resource\\Locale',
    'Atolye15\\Delivery\\Synchronization\\DeletedResource' => 'Atolye15\\Delivery\\Resource\\DeletedResource',
    'Atolye15\\Delivery\\Synchronization\\DeletedAsset' => 'Atolye15\\Delivery\\Resource\\DeletedAsset',
    'Atolye15\\Delivery\\Synchronization\\DeletedContentType' => 'Atolye15\\Delivery\\Resource\\DeletedContentType',
    'Atolye15\\Delivery\\Synchronization\\DeletedEntry' => 'Atolye15\\Delivery\\Resource\\DeletedEntry',
];

foreach ($classes as $previous => $new) {
    \class_alias($new, $previous, \true);
}
