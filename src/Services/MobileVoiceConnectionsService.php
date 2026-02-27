<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Inbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Outbound;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\WebhookAPIVersion;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileVoiceConnectionsContract;

/**
 * Mobile voice connection operations.
 *
 * @phpstan-import-type InboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type OutboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MobileVoiceConnectionsService implements MobileVoiceConnectionsContract
{
    /**
     * @api
     */
    public MobileVoiceConnectionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MobileVoiceConnectionsRawService($client);
    }

    /**
     * @api
     *
     * Create a Mobile Voice Connection
     *
     * @param Inbound|InboundShape $inbound
     * @param Outbound|OutboundShape $outbound
     * @param list<string> $tags
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        bool $active = true,
        string $connectionName = 'Telnyx Mobile Voice IMS',
        Inbound|array|null $inbound = null,
        Outbound|array|null $outbound = null,
        ?array $tags = null,
        WebhookAPIVersion|string $webhookAPIVersion = '2',
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): MobileVoiceConnectionNewResponse {
        $params = Util::removeNulls(
            [
                'active' => $active,
                'connectionName' => $connectionName,
                'inbound' => $inbound,
                'outbound' => $outbound,
                'tags' => $tags,
                'webhookAPIVersion' => $webhookAPIVersion,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a Mobile Voice Connection
     *
     * @param string $id The ID of the mobile voice connection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MobileVoiceConnectionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Mobile Voice Connection
     *
     * @param string $id The ID of the mobile voice connection
     * @param \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Inbound|InboundShape1 $inbound
     * @param \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Outbound|OutboundShape1 $outbound
     * @param list<string> $tags
     * @param \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\WebhookAPIVersion|value-of<\Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\WebhookAPIVersion> $webhookAPIVersion
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?bool $active = null,
        ?string $connectionName = null,
        \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Inbound|array|null $inbound = null,
        \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Outbound|array|null $outbound = null,
        ?array $tags = null,
        \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\WebhookAPIVersion|string|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): MobileVoiceConnectionUpdateResponse {
        $params = Util::removeNulls(
            [
                'active' => $active,
                'connectionName' => $connectionName,
                'inbound' => $inbound,
                'outbound' => $outbound,
                'tags' => $tags,
                'webhookAPIVersion' => $webhookAPIVersion,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List Mobile Voice Connections
     *
     * @param string $filterConnectionNameContains Filter by connection name containing the given string
     * @param int $pageNumber The page number to load
     * @param int $pageSize The size of the page
     * @param string $sort Sort by field (e.g., created_at, connection_name, active). Prefix with - for descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MobileVoiceConnection>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterConnectionNameContains = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterConnectionNameContains' => $filterConnectionNameContains,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Mobile Voice Connection
     *
     * @param string $id The ID of the mobile voice connection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MobileVoiceConnectionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
