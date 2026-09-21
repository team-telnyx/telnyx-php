<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
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
     * Creates a new mobile voice connection with the provided configuration and returns the created connection.
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
        string|Omitted|null $webhookEventFailoverURL = Omitted::VALUE,
        string|Omitted|null $webhookEventURL = Omitted::VALUE,
        int|Omitted|null $webhookTimeoutSecs = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): MobileVoiceConnectionNewResponse {
        $params = array_filter(
            [
                'active' => $active,
                'connectionName' => $connectionName,
                'inbound' => $inbound ?? Omitted::VALUE,
                'outbound' => $outbound ?? Omitted::VALUE,
                'tags' => $tags ?? Omitted::VALUE,
                'webhookAPIVersion' => $webhookAPIVersion,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details of a specific mobile voice connection.
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
     * Update the settings of a specific mobile voice connection.
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
        string|Omitted|null $webhookEventFailoverURL = Omitted::VALUE,
        string|Omitted|null $webhookEventURL = Omitted::VALUE,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): MobileVoiceConnectionUpdateResponse {
        $params = array_filter(
            [
                'active' => $active ?? Omitted::VALUE,
                'connectionName' => $connectionName ?? Omitted::VALUE,
                'inbound' => $inbound ?? Omitted::VALUE,
                'outbound' => $outbound ?? Omitted::VALUE,
                'tags' => $tags ?? Omitted::VALUE,
                'webhookAPIVersion' => $webhookAPIVersion ?? Omitted::VALUE,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookEventURL' => $webhookEventURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs ?? Omitted::VALUE,
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
     * Retrieve a paginated list of mobile voice connections on your account.
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
        $params = array_filter(
            [
                'filterConnectionNameContains' => $filterConnectionNameContains ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
                'sort' => $sort ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a mobile voice connection from your account.
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
