<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Filter;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Page;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Sort;
use Telnyx\FqdnConnections\FqdnConnectionListResponse;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Telnyx\FqdnConnections\InboundFqdn;
use Telnyx\FqdnConnections\OutboundFqdn;
use Telnyx\FqdnConnections\TransportProtocol;
use Telnyx\FqdnConnections\WebhookAPIVersion;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface FqdnConnectionsContract
{
    /**
     * @api
     *
     * @param string $connectionName a user-assigned name to help manage the connection
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param InboundFqdn $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $microsoftTeamsSbc When enabled, the connection will be created for Microsoft Teams Direct Routing. A *.mstsbc.telnyx.tech FQDN will be created for the connection automatically.
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param OutboundFqdn $outbound
     * @param ConnectionRtcpSettings $rtcpSettings
     * @param list<string> $tags tags associated with the connection
     * @param TransportProtocol|value-of<TransportProtocol> $transportProtocol One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @return FqdnConnectionNewResponse<HasRawResponse>
     */
    public function create(
        $connectionName,
        $active = omit,
        $anchorsiteOverride = omit,
        $androidPushCredentialID = omit,
        $defaultOnHoldComfortNoiseEnabled = omit,
        $dtmfType = omit,
        $encodeContactHeaderEnabled = omit,
        $encryptedMedia = omit,
        $inbound = omit,
        $iosPushCredentialID = omit,
        $microsoftTeamsSbc = omit,
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
    ): FqdnConnectionNewResponse;

    /**
     * @api
     *
     * @return FqdnConnectionGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnConnectionGetResponse;

    /**
     * @api
     *
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param string $connectionName a user-assigned name to help manage the connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param InboundFqdn $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer that the sender and receiver negotiate T38 directly when both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call according to each leg's settings.
     * @param OutboundFqdn $outbound
     * @param ConnectionRtcpSettings $rtcpSettings
     * @param list<string> $tags tags associated with the connection
     * @param TransportProtocol|value-of<TransportProtocol> $transportProtocol One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @return FqdnConnectionUpdateResponse<HasRawResponse>
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
    ): FqdnConnectionUpdateResponse;

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
     * @return FqdnConnectionListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): FqdnConnectionListResponse;

    /**
     * @api
     *
     * @return FqdnConnectionDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnConnectionDeleteResponse;
}
