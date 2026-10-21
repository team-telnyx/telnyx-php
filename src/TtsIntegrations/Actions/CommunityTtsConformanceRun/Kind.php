<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun;

/**
 * `test_connection`: run by the owner. `conformance`: run by Telnyx during review.
 */
enum Kind: string
{
    case TEST_CONNECTION = 'test_connection';

    case CONFORMANCE = 'conformance';
}
