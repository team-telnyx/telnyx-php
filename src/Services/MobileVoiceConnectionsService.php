<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\WebhookAPIVersion;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileVoiceConnectionsContract;

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
     * @param array{channelLimit?: int} $inbound
     * @param array{channelLimit?: int, outboundVoiceProfileID?: string} $outbound
     * @param list<string> $tags
     * @param '1'|'2'|WebhookAPIVersion $webhookAPIVersion
     *
     * @throws APIException
     */
    public function create(
        bool $active = true,
        string $connectionName = 'Telnyx Mobile Voice IMS',
        ?array $inbound = null,
        ?array $outbound = null,
        ?array $tags = null,
        string|WebhookAPIVersion $webhookAPIVersion = '2',
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionNewResponse {
        $params = [
            'active' => $active,
            'connectionName' => $connectionName,
            'inbound' => $inbound,
            'outbound' => $outbound,
            'tags' => $tags,
            'webhookAPIVersion' => $webhookAPIVersion,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookEventURL' => $webhookEventURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     * @param array{channelLimit?: int} $inbound
     * @param array{channelLimit?: int, outboundVoiceProfileID?: string} $outbound
     * @param list<string> $tags
     * @param '1'|'2'|\Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\WebhookAPIVersion $webhookAPIVersion
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?bool $active = null,
        ?string $connectionName = null,
        ?array $inbound = null,
        ?array $outbound = null,
        ?array $tags = null,
        string|\Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\WebhookAPIVersion|null $webhookAPIVersion = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionUpdateResponse {
        $params = [
            'active' => $active,
            'connectionName' => $connectionName,
            'inbound' => $inbound,
            'outbound' => $outbound,
            'tags' => $tags,
            'webhookAPIVersion' => $webhookAPIVersion,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookEventURL' => $webhookEventURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        $params = [
            'filterConnectionNameContains' => $filterConnectionNameContains,
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize,
            'sort' => $sort,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobileVoiceConnectionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
