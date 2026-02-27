<?php

declare(strict_types=1);

namespace Telnyx\Services\Organizations\Users;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Organizations\Users\Actions\ActionRemoveResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Organizations\Users\ActionsContract;

/**
 * Operations related to users in your organization.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Deletes a user in your organization.
     *
     * @param string $id Organization User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRemoveResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
