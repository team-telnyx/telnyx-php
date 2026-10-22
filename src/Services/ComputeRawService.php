<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Compute\ComputeGetResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ComputeRawContract;

/**
 * Inspect Stateful Actor types.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ComputeRawService implements ComputeRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve one account-scoped Stateful Actor type. owner_function_id identifies the function that owns and ships the actor class; other functions may reference the same actor type through actor bindings.
     *
     * @param string $id Actor type ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ComputeGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['compute/actors/%1$s', $id],
            options: $requestOptions,
            convert: ComputeGetResponse::class,
        );
    }
}
