<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnectsCoverage\VirtualCrossConnectsCoverageListParams\Filter;

/**
 * The Virtual Private Cloud provider.
 */
enum CloudProvider: string
{
    case AWS = 'aws';

    case AZURE = 'azure';

    case GCE = 'gce';
}
