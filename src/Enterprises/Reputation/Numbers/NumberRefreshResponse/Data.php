<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse\Data\Result;

/**
 * @phpstan-import-type ResultShape from \Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse\Data\Result
 *
 * @phpstan-type DataShape = array{
 *   results: list<Result|ResultShape>,
 *   totalFailed: int,
 *   totalRequested: int,
 *   totalSuccessful: int,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Per-number outcome of the refresh.
     *
     * @var list<Result> $results
     */
    #[Required(list: Result::class)]
    public array $results;

    #[Required('total_failed')]
    public int $totalFailed;

    #[Required('total_requested')]
    public int $totalRequested;

    #[Required('total_successful')]
    public int $totalSuccessful;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   results: ..., totalFailed: ..., totalRequested: ..., totalSuccessful: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withResults(...)
     *   ->withTotalFailed(...)
     *   ->withTotalRequested(...)
     *   ->withTotalSuccessful(...)
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
     * @param list<Result|ResultShape> $results
     */
    public static function with(
        array $results,
        int $totalFailed,
        int $totalRequested,
        int $totalSuccessful
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['totalFailed'] = $totalFailed;
        $self['totalRequested'] = $totalRequested;
        $self['totalSuccessful'] = $totalSuccessful;

        return $self;
    }

    /**
     * Per-number outcome of the refresh.
     *
     * @param list<Result|ResultShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTotalFailed(int $totalFailed): self
    {
        $self = clone $this;
        $self['totalFailed'] = $totalFailed;

        return $self;
    }

    public function withTotalRequested(int $totalRequested): self
    {
        $self = clone $this;
        $self['totalRequested'] = $totalRequested;

        return $self;
    }

    public function withTotalSuccessful(int $totalSuccessful): self
    {
        $self = clone $this;
        $self['totalSuccessful'] = $totalSuccessful;

        return $self;
    }
}
