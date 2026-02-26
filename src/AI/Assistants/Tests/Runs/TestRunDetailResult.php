<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\Runs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TestRunDetailResultShape = array{
 *   name: string, status: TestStatus|value-of<TestStatus>
 * }
 */
final class TestRunDetailResult implements BaseModel
{
    /** @use SdkModel<TestRunDetailResultShape> */
    use SdkModel;

    #[Required]
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
    #[Required(enum: TestStatus::class)]
    public string $status;

    /**
     * `new TestRunDetailResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestRunDetailResult::with(name: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestRunDetailResult)->withName(...)->withStatus(...)
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
        $self = new self;

        $self['name'] = $name;
        $self['status'] = $status;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
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
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
