<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse\DetailStatus;
use Telnyx\AI\Assistants\Tests\Runs\TestStatus;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Paginated list of test runs with metadata.
 *
 * Returns test run execution results with pagination support for
 * handling large numbers of test executions.
 *
 * @phpstan-type PaginatedTestRunListShape = array{
 *   data: list<TestRunResponse>, meta: Meta
 * }
 */
final class PaginatedTestRunList implements BaseModel
{
    /** @use SdkModel<PaginatedTestRunListShape> */
    use SdkModel;

    /**
     * Array of test run objects for the current page.
     *
     * @var list<TestRunResponse> $data
     */
    #[Required(list: TestRunResponse::class)]
    public array $data;

    /**
     * Pagination metadata including total counts and current page info.
     */
    #[Required]
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
     * @param list<TestRunResponse|array{
     *   createdAt: \DateTimeInterface,
     *   runID: string,
     *   status: value-of<TestStatus>,
     *   testID: string,
     *   triggeredBy: string,
     *   completedAt?: \DateTimeInterface|null,
     *   conversationID?: string|null,
     *   conversationInsightsID?: string|null,
     *   detailStatus?: list<DetailStatus>|null,
     *   logs?: string|null,
     *   testSuiteRunID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * Array of test run objects for the current page.
     *
     * @param list<TestRunResponse|array{
     *   createdAt: \DateTimeInterface,
     *   runID: string,
     *   status: value-of<TestStatus>,
     *   testID: string,
     *   triggeredBy: string,
     *   completedAt?: \DateTimeInterface|null,
     *   conversationID?: string|null,
     *   conversationInsightsID?: string|null,
     *   detailStatus?: list<DetailStatus>|null,
     *   logs?: string|null,
     *   testSuiteRunID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Pagination metadata including total counts and current page info.
     *
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
