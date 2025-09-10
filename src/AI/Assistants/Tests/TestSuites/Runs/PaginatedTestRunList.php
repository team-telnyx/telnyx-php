<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Paginated list of test runs with metadata.
 *
 * Returns test run execution results with pagination support for
 * handling large numbers of test executions.
 *
 * @phpstan-type paginated_test_run_list = array{
 *   data: list<TestRunResponse>, meta: Meta
 * }
 */
final class PaginatedTestRunList implements BaseModel
{
    /** @use SdkModel<paginated_test_run_list> */
    use SdkModel;

    /**
     * Array of test run objects for the current page.
     *
     * @var list<TestRunResponse> $data
     */
    #[Api(list: TestRunResponse::class)]
    public array $data;

    /**
     * Pagination metadata including total counts and current page info.
     */
    #[Api]
    public Meta $meta;

    /**
     * `new PaginatedTestRunList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PaginatedTestRunList::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PaginatedTestRunList)->withData(...)->withMeta(...)
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
     * @param list<TestRunResponse> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * Array of test run objects for the current page.
     *
     * @param list<TestRunResponse> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    /**
     * Pagination metadata including total counts and current page info.
     */
    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
