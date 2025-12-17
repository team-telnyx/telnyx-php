<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestSuites\Runs;

use Telnyx\AI\Assistants\Tests\Runs\TestRunResponse;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Paginated list of test runs with metadata.
 *
 * Returns test run execution results with pagination support for
 * handling large numbers of test executions.
 *
 * @phpstan-import-type TestRunResponseShape from \Telnyx\AI\Assistants\Tests\Runs\TestRunResponse
 * @phpstan-import-type MetaShape from \Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta
 *
 * @phpstan-type PaginatedTestRunListShape = array{
 *   data: list<TestRunResponseShape>, meta: Meta|MetaShape
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
     * @param list<TestRunResponseShape> $data
     * @param Meta|MetaShape $meta
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
     * @param list<TestRunResponseShape> $data
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
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
