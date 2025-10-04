<?php

declare(strict_types=1);

use HeyFrame\Core\Framework\DataAbstractionLayer\Search\Criteria;
use HeyFrame\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use HeyFrame\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsAnyFilter;
use HeyFrame\Core\Framework\DataAbstractionLayer\Search\Filter\NotFilter;
use HeyFrame\Core\Framework\DataAbstractionLayer\Search\Filter\MultiFilter;

$criteria = new Criteria();
$criteria->addFilter(new EqualsFilter('id', '12345'));

// This should be allowed when wrapped in NotFilter
$criteria->addFilter(new NotFilter(
    MultiFilter::CONNECTION_AND,
    [
        new EqualsAnyFilter('id', ['123', '456']),
    ],
));
