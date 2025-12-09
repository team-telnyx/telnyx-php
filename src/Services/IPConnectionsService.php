<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\IPConnections\InboundIP;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\AniNumberFormat;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\DefaultRoutingMethod;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\DnisNumberFormat;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\SipRegion;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\IPConnections\IPConnectionCreateParams\TransportProtocol;
use Telnyx\IPConnections\IPConnectionCreateParams\WebhookAPIVersion;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams\Sort;
use Telnyx\IPConnections\IPConnectionListResponse;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\IPConnections\OutboundIP;
use Telnyx\IPConnections\OutboundIP\AniOverrideType;
use Telnyx\IPConnections\OutboundIP\IPAuthenticationMethod;
use Telnyx\IPConnections\OutboundIP\T38ReinviteSource;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IPConnectionsContract;

final class IPConnectionsService implements IPConnectionsContract
{
    /**
     * @api
     */
    public IPConnectionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IPConnectionsRawService($client);
    }

    /**
     * @api
     *
     * Creates an IP connection.
     *
     * @param bool $active Defaults to true
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'Sydney, Australia'|'Amsterdam, Netherlands'|'London, UK'|'Toronto, Canada'|'Vancouver, Canada'|'Frankfurt, Germany'|AnchorsiteOverride $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param 'SRTP'|EncryptedMedia|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param array{
     *   aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|AniNumberFormat,
     *   channelLimit?: int,
     *   codecs?: list<string>,
     *   defaultRoutingMethod?: 'sequential'|'round-robin'|DefaultRoutingMethod,
     *   dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *   generateRingbackTone?: bool,
     *   isupHeadersEnabled?: bool,
     *   prackEnabled?: bool,
     *   shakenStirEnabled?: bool,
     *   sipCompactHeadersEnabled?: bool,
     *   sipRegion?: 'US'|'Europe'|'Australia'|SipRegion,
     *   sipSubdomain?: string,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *   timeout1xxSecs?: int,
     *   timeout2xxSecs?: int,
     * } $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param array{
     *   aniOverride?: string,
     *   aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int,
     *   generateRingbackTone?: bool,
     *   instantRingbackEnabled?: bool,
     *   ipAuthenticationMethod?: 'tech-prefixp-charge-info'|'token'|IPAuthenticationMethod,
     *   ipAuthenticationToken?: string,
     *   localization?: string,
     *   outboundVoiceProfileID?: string,
     *   t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *   techPrefix?: string,
     * }|OutboundIP $outbound
     * @param array{
     *   captureEnabled?: bool,
     *   port?: 'rtcp-mux'|'rtp+1'|Port,
     *   reportFrequencySecs?: int,
     * }|ConnectionRtcpSettings $rtcpSettings
     * @param list<string> $tags tags associated with the connection
     * @param 'UDP'|'TCP'|'TLS'|TransportProtocol $transportProtocol One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     * @param '1'|'2'|WebhookAPIVersion $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function create(
        ?bool $active = null,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        ?string $androidPushCredentialID = null,
        bool $callCostInWebhooks = false,
        ?string $connectionName = null,
        bool $defaultOnHoldComfortNoiseEnabled = true,
        string|DtmfType $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        string|EncryptedMedia|null $encryptedMedia = null,
        ?array $inbound = null,
        ?string $iosPushCredentialID = null,
        bool $onnetT38PassthroughEnabled = false,
        array|OutboundIP|null $outbound = null,
        array|ConnectionRtcpSettings|null $rtcpSettings = null,
        ?array $tags = null,
        string|TransportProtocol $transportProtocol = 'UDP',
        string|WebhookAPIVersion $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionNewResponse {
        $params = [
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
            'androidPushCredentialID' => $androidPushCredentialID,
            'callCostInWebhooks' => $callCostInWebhooks,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing ip connection.
     *
     * @param string $id IP Connection ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing IP connection.
     *
     * @param string $id identifies the type of resource
     * @param bool $active Defaults to true
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'Sydney, Australia'|'Amsterdam, Netherlands'|'London, UK'|'Toronto, Canada'|'Vancouver, Canada'|'Frankfurt, Germany'|AnchorsiteOverride $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param 'SRTP'|EncryptedMedia|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param array{
     *   aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|InboundIP\AniNumberFormat,
     *   channelLimit?: int,
     *   codecs?: list<string>,
     *   defaultPrimaryIPID?: string,
     *   defaultRoutingMethod?: 'sequential'|'round-robin'|InboundIP\DefaultRoutingMethod,
     *   defaultSecondaryIPID?: string,
     *   defaultTertiaryIPID?: string,
     *   dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|InboundIP\DnisNumberFormat,
     *   generateRingbackTone?: bool,
     *   isupHeadersEnabled?: bool,
     *   prackEnabled?: bool,
     *   shakenStirEnabled?: bool,
     *   sipCompactHeadersEnabled?: bool,
     *   sipRegion?: 'US'|'Europe'|'Australia'|InboundIP\SipRegion,
     *   sipSubdomain?: string,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|InboundIP\SipSubdomainReceiveSettings,
     *   timeout1xxSecs?: int,
     *   timeout2xxSecs?: int,
     * }|InboundIP $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param array{
     *   aniOverride?: string,
     *   aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int,
     *   generateRingbackTone?: bool,
     *   instantRingbackEnabled?: bool,
     *   ipAuthenticationMethod?: 'tech-prefixp-charge-info'|'token'|IPAuthenticationMethod,
     *   ipAuthenticationToken?: string,
     *   localization?: string,
     *   outboundVoiceProfileID?: string,
     *   t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *   techPrefix?: string,
     * }|OutboundIP $outbound
     * @param array{
     *   captureEnabled?: bool,
     *   port?: 'rtcp-mux'|'rtp+1'|Port,
     *   reportFrequencySecs?: int,
     * }|ConnectionRtcpSettings $rtcpSettings
     * @param list<string> $tags tags associated with the connection
     * @param 'UDP'|'TCP'|'TLS'|\Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol $transportProtocol One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     * @param '1'|'2'|\Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?bool $active = null,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        ?string $androidPushCredentialID = null,
        bool $callCostInWebhooks = false,
        ?string $connectionName = null,
        bool $defaultOnHoldComfortNoiseEnabled = true,
        string|DtmfType $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        string|EncryptedMedia|null $encryptedMedia = null,
        array|InboundIP|null $inbound = null,
        ?string $iosPushCredentialID = null,
        bool $onnetT38PassthroughEnabled = false,
        array|OutboundIP|null $outbound = null,
        array|ConnectionRtcpSettings|null $rtcpSettings = null,
        ?array $tags = null,
        string|\Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol $transportProtocol = 'UDP',
        string|\Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): IPConnectionUpdateResponse {
        $params = [
            'active' => $active,
            'anchorsiteOverride' => $anchorsiteOverride,
            'androidPushCredentialID' => $androidPushCredentialID,
            'callCostInWebhooks' => $callCostInWebhooks,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your IP connections.
     *
     * @param array{
     *   connectionName?: array{contains?: string},
     *   fqdn?: string,
     *   outboundVoiceProfileID?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_name], filter[fqdn], filter[outbound_voice_profile_id], filter[outbound.outbound_voice_profile_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param 'created_at'|'connection_name'|'active'|Sort $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
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
        ?array $filter = null,
        ?array $page = null,
        string|Sort $sort = 'created_at',
        ?RequestOptions $requestOptions = null,
    ): IPConnectionListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an existing IP connection.
     *
     * @param string $id identifies the type of resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): IPConnectionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
