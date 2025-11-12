<?php

declare(strict_types=1);

namespace Telnyx\Seti;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter;

/**
 * Returns the results of the various black box tests.
 *
 * @see Telnyx\Services\SetiService::retrieveBlackBoxTestResults()
 *
 * @phpstan-type SetiRetrieveBlackBoxTestResultsParamsShape = array{
 *   filter?: Filter
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
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[product].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
