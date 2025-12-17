<?php

declare(strict_types=1);

namespace Telnyx\Seti;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter;

/**
 * Returns the results of the various black box tests.
 *
 * @see Telnyx\Services\SetiService::retrieveBlackBoxTestResults()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter
 *
 * @phpstan-type SetiRetrieveBlackBoxTestResultsParamsShape = array{
 *   filter?: null|Filter|FilterShape
 * }
 */
final class SetiRetrieveBlackBoxTestResultsParams implements BaseModel
{
    /** @use SdkModel<SetiRetrieveBlackBoxTestResultsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[product].
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[product].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
