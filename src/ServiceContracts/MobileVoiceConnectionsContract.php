<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\WebhookAPIVersion;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface MobileVoiceConnectionsContract
{
    /**
     * @api
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
    ): MobileVoiceConnectionNewResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobileVoiceConnectionGetResponse;

    /**
     * @api
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
    ): MobileVoiceConnectionUpdateResponse;

    /**
     * @api
     *
     * @param string $filterConnectionNameContains Filter by connection name containing the given string
     * @param int $pageNumber The page number to load
     * @param int $pageSize The size of the page
     * @param string $sort Sort by field (e.g., created_at, connection_name, active). Prefix with - for descending order.
     *
     * @throws APIException
     */
    public function list(
        ?string $filterConnectionNameContains = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $sort = null,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionListResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobileVoiceConnectionDeleteResponse;
}
