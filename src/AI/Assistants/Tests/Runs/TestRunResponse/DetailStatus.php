<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;

use Telnyx\AI\Assistants\Tests\Runs\TestStatus;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type detail_status = array{name: string, status: value-of<TestStatus>}
 */
final class DetailStatus implements BaseModel
{
    /** @use SdkModel<detail_status> */
    use SdkModel;

    #[Api]
    public string $name;

    /**
     * Represents the lifecycle of a test:
     *   - 'pending': Test is waiting to be executed.
     *   - 'starting': Test execution is initializing.
     *   - 'running': Test is currently executing.
     *   - 'passed': Test completed successfully.
     *   - 'failed': Test executed but did not pass.
     *   - 'error': An error occurred during test execution.
     *
     * @var value-of<TestStatus> $status
     */
    #[Api(enum: TestStatus::class)]
    public string $status;

    /**
     * `new DetailStatus()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DetailStatus::with(name: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DetailStatus)->withName(...)->withStatus(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TestStatus|value-of<TestStatus> $status
     */
    public static function with(string $name, TestStatus|string $status): self
    {
        $obj = new self;

        $obj->name = $name;
        $obj->status = $status instanceof TestStatus ? $status->value : $status;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Represents the lifecycle of a test:
     *   - 'pending': Test is waiting to be executed.
     *   - 'starting': Test execution is initializing.
     *   - 'running': Test is currently executing.
     *   - 'passed': Test completed successfully.
     *   - 'failed': Test executed but did not pass.
     *   - 'error': An error occurred during test execution.
     *
     * @param TestStatus|value-of<TestStatus> $status
     */
    public function withStatus(TestStatus|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof TestStatus ? $status->value : $status;

        return $obj;
    }
}
