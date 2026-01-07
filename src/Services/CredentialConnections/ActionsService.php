<?php

declare(strict_types=1);

namespace Telnyx\Services\CredentialConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\Actions\ActionCheckRegistrationStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CredentialConnections\ActionsContract;

/**
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
     * Checks the registration_status for a credential connection, (`registration_status`) as well as the timestamp for the last SIP registration event (`registration_status_updated_at`)
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
