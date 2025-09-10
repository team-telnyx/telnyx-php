<?php

declare(strict_types=1);

namespace Telnyx\Storage\StorageListMigrationSourceCoverageResponse\Data;

/**
 * Cloud provider from which to migrate data.
 */
enum Provider: string
{
    case AWS = 'aws';
}
