<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   pageNumber: int,
 *   pageSize: int,
 *   totalPages: int,
 *   totalResults: int,
 *   totalResultsCapped: bool,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /**
     * The page returned, counting from 1.
     */
    #[Required('page_number')]
    public int $pageNumber;

    /**
     * Results per page.
     */
    #[Required('page_size')]
    public int $pageSize;

    /**
     * Pages that can be requested; 0 when nothing matched.
     */
    #[Required('total_pages')]
    public int $totalPages;

    /**
     * Results across every page.
     */
    #[Required('total_results')]
    public int $totalResults;

    /**
     * `true` when the window holds more than 10,000 rows. The two totals are then lower bounds: narrow the window, or page until a page comes back empty.
     */
    #[Required('total_results_capped')]
    public bool $totalResultsCapped;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(
     *   pageNumber: ...,
     *   pageSize: ...,
     *   totalPages: ...,
     *   totalResults: ...,
     *   totalResultsCapped: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)
     *   ->withPageNumber(...)
     *   ->withPageSize(...)
     *   ->withTotalPages(...)
     *   ->withTotalResults(...)
     *   ->withTotalResultsCapped(...)
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
     */
    public static function with(
        int $pageNumber,
        int $pageSize,
        int $totalPages,
        int $totalResults,
        bool $totalResultsCapped,
    ): self {
        $self = new self;

        $self['pageNumber'] = $pageNumber;
        $self['pageSize'] = $pageSize;
        $self['totalPages'] = $totalPages;
        $self['totalResults'] = $totalResults;
        $self['totalResultsCapped'] = $totalResultsCapped;

        return $self;
    }

    /**
     * The page returned, counting from 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Pages that can be requested; 0 when nothing matched.
     */
    public function withTotalPages(int $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    /**
     * Results across every page.
     */
    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }

    /**
     * `true` when the window holds more than 10,000 rows. The two totals are then lower bounds: narrow the window, or page until a page comes back empty.
     */
    public function withTotalResultsCapped(bool $totalResultsCapped): self
    {
        $self = clone $this;
        $self['totalResultsCapped'] = $totalResultsCapped;

        return $self;
    }
}
