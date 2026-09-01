<?php

declare(strict_types=1);

namespace Telnyx\Services\CredentialConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CredentialConnections\ActionsContract;

/**
 * Credential connection operations.
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
     * Returns the live SIP registration status for a credential connection. Reports whether the endpoint is currently registered (`status`) and the timestamp of the last SIP registration event (`last_registration`).
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function checkRegistrationStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionCheckRegistrationStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->checkRegistrationStatus($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
