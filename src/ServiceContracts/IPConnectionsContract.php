<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\InboundIP;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound;
use Telnyx\IPConnections\IPConnectionCreateParams\TransportProtocol;
use Telnyx\IPConnections\IPConnectionCreateParams\WebhookAPIVersion;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams\Filter;
use Telnyx\IPConnections\IPConnectionListParams\Page;
use Telnyx\IPConnections\IPConnectionListParams\Sort;
use Telnyx\IPConnections\IPConnectionListResponse;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\IPConnections\OutboundIP;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface IPConnectionsContract
{
    /**
     * @api
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
    ): IPConnectionNewResponse;

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
    ): IPConnectionNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionGetResponse;

    /**
     * @api
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
    ): IPConnectionUpdateResponse;

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
    ): IPConnectionUpdateResponse;

    /**
     * @api
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
    ): IPConnectionListResponse;

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
    ): IPConnectionListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionDeleteResponse;
}
