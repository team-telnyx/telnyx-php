<?php

declare(strict_types=1);

namespace Telnyx\Seti;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Seti\SetiRetrieveBlackBoxTestResultsParams\Filter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SetiRetrieveBlackBoxTestResultsParams); // set properties as needed
 * $client->seti->retrieveBlackBoxTestResults(...$params->toArray());
 * ```
 * Returns the results of the various black box tests.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->seti->retrieveBlackBoxTestResults(...$params->toArray());`
 *
 * @see Telnyx\Seti->retrieveBlackBoxTestResults
 *
 * @phpstan-type seti_retrieve_black_box_test_results_params = array{
 *   filter?: Filter
 * }
 */
final class SetiRetrieveBlackBoxTestResultsParams implements BaseModel
{
    /** @use SdkModel<seti_retrieve_black_box_test_results_params> */
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
