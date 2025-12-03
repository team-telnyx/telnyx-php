<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves paginated history of test runs for a specific test suite with filtering options.
 *
 * @see Telnyx\Services\AI\Assistants\Tests\TestSuites\RunsService::list()
 *
 * @phpstan-type RunListParamsShape = array{
 *   page_number_?: int,
 *   page_size_?: int,
 *   status?: string,
 *   test_suite_run_id?: string,
 * }
 */
final class RunListParams implements BaseModel
{
    /** @use SdkModel<RunListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?int $page_number_;

    #[Api(optional: true)]
    public ?int $page_size_;

    /**
     * Filter runs by execution status (pending, running, completed, failed, timeout).
     */
    #[Api(optional: true)]
    public ?string $status;

    /**
     * Filter runs by specific suite execution batch ID.
     */
    #[Api(optional: true)]
    public ?string $test_suite_run_id;

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
        ?int $page_number_ = null,
        ?int $page_size_ = null,
        ?string $status = null,
        ?string $test_suite_run_id = null,
    ): self {
        $obj = new self;

        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;
        null !== $status && $obj->status = $status;
        null !== $test_suite_run_id && $obj->test_suite_run_id = $test_suite_run_id;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

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
        $obj->test_suite_run_id = $testSuiteRunID;

        return $obj;
    }
}
