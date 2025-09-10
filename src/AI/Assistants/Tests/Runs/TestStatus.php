<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs;

/**
 * Represents the lifecycle of a test:
 *   - 'pending': Test is waiting to be executed.
 *   - 'starting': Test execution is initializing.
 *   - 'running': Test is currently executing.
 *   - 'passed': Test completed successfully.
 *   - 'failed': Test executed but did not pass.
 *   - 'error': An error occurred during test execution.
 */
enum TestStatus: string
{
    case PENDING = 'pending';

    case STARTING = 'starting';

    case RUNNING = 'running';

    case PASSED = 'passed';

    case FAILED = 'failed';

    case ERROR = 'error';
}
