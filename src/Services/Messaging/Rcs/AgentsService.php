<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging\Rcs;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\Rcs\Agents\RcsAgent;
use Telnyx\Rcs\Agents\RcsAgentResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging\Rcs\AgentsContract;

/**
 * Send RCS messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AgentsService implements AgentsContract
{
    /**
     * @api
     */
    public AgentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AgentsRawService($client);
    }

    /**
     * @api
     *
     * Returns the configuration and current state of the specified RCS agent.
     *
     * @param string $id RCS agent ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): RcsAgentResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the supplied configuration fields on the specified RCS agent.
     *
     * @param string $id RCS agent ID
     * @param string|Omitted|null $profileID Messaging profile ID associated with the RCS Agent
     * @param string|Omitted|null $webhookFailoverURL Failover URL to receive RCS events
     * @param string|Omitted|null $webhookURL URL to receive RCS events
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string|Omitted|null $profileID = Omitted::VALUE,
        string|Omitted|null $webhookFailoverURL = Omitted::VALUE,
        string|Omitted|null $webhookURL = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): RcsAgentResponse {
        $params = array_filter(
            [
                'profileID' => $profileID,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns RCS agents available to the authenticated account.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RcsAgent>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
