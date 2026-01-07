<?php

declare(strict_types=1);

namespace Telnyx\Services\Faxes;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Faxes\Actions\ActionCancelResponse;
use Telnyx\Faxes\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Faxes\ActionsContract;

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
     * Cancel the outbound fax that is in one of the following states: `queued`, `media.processed`, `originated` or `sending`
     *
     * @param string $id the unique identifier of a fax
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionCancelResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cancel($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Refreshes the inbound fax's media_url when it has expired
     *
     * @param string $id the unique identifier of a fax
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refresh(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRefreshResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->refresh($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
