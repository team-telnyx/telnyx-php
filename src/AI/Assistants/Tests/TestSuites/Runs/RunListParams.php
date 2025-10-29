<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\RunListParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves paginated history of test runs for a specific test suite with filtering options.
 *
 * @see Telnyx\AI\Assistants\Tests\TestSuites\Runs->list
 *
 * @phpstan-type RunListParamsShape = array{
 *   page?: Page, status?: string, testSuiteRunID?: string
 * }
 */
final class RunListParams implements BaseModel
{
    /** @use SdkModel<RunListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Filter runs by execution status (pending, running, completed, failed, timeout).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Filter runs by specific suite execution batch ID.
     */
    #[Api(optional: true)]
    public ?string $testSuiteRunID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?Page $page = null,
        ?string $status = null,
        ?string $testSuiteRunID = null
    ): self {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $status && $obj->status = $status;
        null !== $testSuiteRunID && $obj->testSuiteRunID = $testSuiteRunID;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * Filter runs by execution status (pending, running, completed, failed, timeout).
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Filter runs by specific suite execution batch ID.
     */
    public function withTestSuiteRunID(string $testSuiteRunID): self
    {
        $obj = clone $this;
        $obj->testSuiteRunID = $testSuiteRunID;

        return $obj;
    }
}
