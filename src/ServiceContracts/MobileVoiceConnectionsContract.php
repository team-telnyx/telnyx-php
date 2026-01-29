<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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

/**
 * @phpstan-import-type InboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type OutboundShape from \Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MobileVoiceConnectionsContract
{
    /**
     * @api
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
    ): MobileVoiceConnectionNewResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MobileVoiceConnectionGetResponse;

    /**
     * @api
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
    ): MobileVoiceConnectionUpdateResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MobileVoiceConnectionDeleteResponse;
}
