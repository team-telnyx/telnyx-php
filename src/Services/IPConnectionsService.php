<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\InboundIP;
use Telnyx\IPConnections\IPConnectionCreateParams;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound;
use Telnyx\IPConnections\IPConnectionCreateParams\TransportProtocol;
use Telnyx\IPConnections\IPConnectionCreateParams\WebhookAPIVersion;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams;
use Telnyx\IPConnections\IPConnectionListParams\Filter;
use Telnyx\IPConnections\IPConnectionListParams\Page;
use Telnyx\IPConnections\IPConnectionListParams\Sort;
use Telnyx\IPConnections\IPConnectionListResponse;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateParams;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\IPConnections\OutboundIP;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IPConnectionsContract;

use const Telnyx\Core\OMIT as omit;

final class IPConnectionsService implements IPConnectionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an IP connection.
     *
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param string $connectionName
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param Inbound $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param OutboundIP $outbound
     * @param ConnectionRtcpSettings $rtcpSettings
     * @param list<string> $tags tags associated with the connection
     * @param TransportProtocol|value-of<TransportProtocol> $transportProtocol One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function create(
        $active = omit,
        $anchorsiteOverride = omit,
        $androidPushCredentialID = omit,
        $connectionName = omit,
        $defaultOnHoldComfortNoiseEnabled = omit,
        $dtmfType = omit,
        $encodeContactHeaderEnabled = omit,
        $encryptedMedia = omit,
        $inbound = omit,
        $iosPushCredentialID = omit,
        $onnetT38PassthroughEnabled = omit,
        $outbound = omit,
        $rtcpSettings = omit,
        $tags = omit,
        $transportProtocol = omit,
        $webhookAPIVersion = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionNewResponse {
        $params = [
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
            'androidPushCredentialID' => $androidPushCredentialID,
            'connectionName' => $connectionName,
            'defaultOnHoldComfortNoiseEnabled' => $defaultOnHoldComfortNoiseEnabled,
            'dtmfType' => $dtmfType,
            'encodeContactHeaderEnabled' => $encodeContactHeaderEnabled,
            'encryptedMedia' => $encryptedMedia,
            'inbound' => $inbound,
            'iosPushCredentialID' => $iosPushCredentialID,
            'onnetT38PassthroughEnabled' => $onnetT38PassthroughEnabled,
            'outbound' => $outbound,
            'rtcpSettings' => $rtcpSettings,
            'tags' => $tags,
            'transportProtocol' => $transportProtocol,
            'webhookAPIVersion' => $webhookAPIVersion,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookEventURL' => $webhookEventURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): IPConnectionNewResponse {
        [$parsed, $options] = IPConnectionCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ip_connections',
            body: (object) $parsed,
            options: $options,
            convert: IPConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing ip connection.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ip_connections/%1$s', $id],
            options: $requestOptions,
            convert: IPConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing IP connection.
     *
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param string $connectionName
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param InboundIP $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param OutboundIP $outbound
     * @param ConnectionRtcpSettings $rtcpSettings
     * @param list<string> $tags tags associated with the connection
     * @param Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol|value-of<Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol> $transportProtocol One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     * @param Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion|value-of<Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $active = omit,
        $anchorsiteOverride = omit,
        $androidPushCredentialID = omit,
        $connectionName = omit,
        $defaultOnHoldComfortNoiseEnabled = omit,
        $dtmfType = omit,
        $encodeContactHeaderEnabled = omit,
        $encryptedMedia = omit,
        $inbound = omit,
        $iosPushCredentialID = omit,
        $onnetT38PassthroughEnabled = omit,
        $outbound = omit,
        $rtcpSettings = omit,
        $tags = omit,
        $transportProtocol = omit,
        $webhookAPIVersion = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionUpdateResponse {
        $params = [
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
            'androidPushCredentialID' => $androidPushCredentialID,
            'connectionName' => $connectionName,
            'defaultOnHoldComfortNoiseEnabled' => $defaultOnHoldComfortNoiseEnabled,
            'dtmfType' => $dtmfType,
            'encodeContactHeaderEnabled' => $encodeContactHeaderEnabled,
            'encryptedMedia' => $encryptedMedia,
            'inbound' => $inbound,
            'iosPushCredentialID' => $iosPushCredentialID,
            'onnetT38PassthroughEnabled' => $onnetT38PassthroughEnabled,
            'outbound' => $outbound,
            'rtcpSettings' => $rtcpSettings,
            'tags' => $tags,
            'transportProtocol' => $transportProtocol,
            'webhookAPIVersion' => $webhookAPIVersion,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookEventURL' => $webhookEventURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): IPConnectionUpdateResponse {
        [$parsed, $options] = IPConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['ip_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: IPConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your IP connections.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_name], filter[fqdn], filter[outbound_voice_profile_id], filter[outbound.outbound_voice_profile_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-connection_name</code>: sorts the result by the
     *     <code>connection_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): IPConnectionListResponse {
        [$parsed, $options] = IPConnectionListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ip_connections',
            query: $parsed,
            options: $options,
            convert: IPConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing IP connection.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ip_connections/%1$s', $id],
            options: $requestOptions,
            convert: IPConnectionDeleteResponse::class,
        );
    }
}
