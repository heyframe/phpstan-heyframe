<?php

declare(strict_types=1);

use Doctrine\DBAL\Connection;
use HeyFrame\Core\Framework\Migration\MigrationStep;

class Test extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement('SET FOREIGN_KEY_CHECKS=0;');
    }
}
