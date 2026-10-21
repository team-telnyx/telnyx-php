<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Compute\ComputeGetResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ComputeContract;
use Telnyx\Services\Compute\FuncsService;

/**
 * Inspect Stateful Actor types.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ComputeService implements ComputeContract
{
    /**
     * @api
     */
    public ComputeRawService $raw;

    /**
     * @api
     */
    public FuncsService $funcs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ComputeRawService($client);
        $this->funcs = new FuncsService($client);
    }

    /**
     * @api
     *
     * Retrieve one account-scoped Stateful Actor type. owner_function_id identifies the function that owns and ships the actor class; other functions may reference the same actor type through actor bindings.
     *
     * @param string $id Actor type ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ComputeGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
