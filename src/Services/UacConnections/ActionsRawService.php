<?php

declare(strict_types=1);

namespace Telnyx\Services\UacConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UacConnections\ActionsRawContract;
use Telnyx\UacConnections\Actions\ActionCheckRegistrationStatusResponse;

/**
 * UAC connection operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Checks the registration status for a UAC connection (`registration_status`) as well as the timestamp for the last SIP registration event (`registration_status_updated_at`).
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionCheckRegistrationStatusResponse>
     *
     * @throws APIException
     */
    public function checkRegistrationStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['uac_connections/%1$s/actions/check_registration_status', $id],
            options: $requestOptions,
            convert: ActionCheckRegistrationStatusResponse::class,
        );
    }
}
