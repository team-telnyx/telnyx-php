<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources\MigrationSourceParams;

/**
 * Cloud provider from which to migrate data. Use 'telnyx' if you want to migrate data from one Telnyx bucket to another.
 */
enum Provider: string
{
    case AWS = 'aws';

    case TELNYX = 'telnyx';
}
