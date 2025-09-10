<?php

declare(strict_types=1);

namespace Telnyx\VirtualCrossConnects\VirtualCrossConnectGetResponse\Data;

/**
 * The Virtual Private Cloud with which you would like to establish a cross connect.
 */
enum CloudProvider: string
{
    case AWS = 'aws';

    case AZURE = 'azure';

    case GCE = 'gce';
}
