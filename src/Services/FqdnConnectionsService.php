<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\DefaultPagination;
use Telnyx\FqdnConnections\FqdnConnection;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Sort;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Telnyx\FqdnConnections\InboundFqdn;
use Telnyx\FqdnConnections\InboundFqdn\AniNumberFormat;
use Telnyx\FqdnConnections\InboundFqdn\DefaultRoutingMethod;
use Telnyx\FqdnConnections\InboundFqdn\DnisNumberFormat;
use Telnyx\FqdnConnections\InboundFqdn\SipRegion;
use Telnyx\FqdnConnections\InboundFqdn\SipSubdomainReceiveSettings;
use Telnyx\FqdnConnections\OutboundFqdn;
use Telnyx\FqdnConnections\OutboundFqdn\AniOverrideType;
use Telnyx\FqdnConnections\OutboundFqdn\IPAuthenticationMethod;
use Telnyx\FqdnConnections\OutboundFqdn\T38ReinviteSource;
use Telnyx\FqdnConnections\TransportProtocol;
use Telnyx\FqdnConnections\WebhookAPIVersion;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnConnectionsContract;

final class FqdnConnectionsService implements FqdnConnectionsContract
{
    /**
     * @api
     */
    public FqdnConnectionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FqdnConnectionsRawService($client);
    }

    /**
     * @api
     *
     * Creates a FQDN connection.
     *
     * @param string $connectionName a user-assigned name to help manage the connection
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
     *   channelLimit?: int|null,
     *   codecs?: list<string>,
     *   defaultPrimaryFqdnID?: string|null,
     *   defaultRoutingMethod?: 'sequential'|'round-robin'|DefaultRoutingMethod|null,
     *   defaultSecondaryFqdnID?: string|null,
     *   defaultTertiaryFqdnID?: string|null,
     *   dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *   generateRingbackTone?: bool,
     *   isupHeadersEnabled?: bool,
     *   prackEnabled?: bool,
     *   shakenStirEnabled?: bool,
     *   sipCompactHeadersEnabled?: bool,
     *   sipRegion?: 'US'|'Europe'|'Australia'|SipRegion,
     *   sipSubdomain?: string|null,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *   timeout1xxSecs?: int,
     *   timeout2xxSecs?: int,
     * }|InboundFqdn $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $microsoftTeamsSbc When enabled, the connection will be created for Microsoft Teams Direct Routing. A *.mstsbc.telnyx.tech FQDN will be created for the connection automatically.
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param array{
     *   aniOverride?: string,
     *   aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int,
     *   encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *   generateRingbackTone?: bool,
     *   instantRingbackEnabled?: bool,
     *   ipAuthenticationMethod?: 'credential-authentication'|'ip-authentication'|IPAuthenticationMethod,
     *   ipAuthenticationToken?: string,
     *   localization?: string,
     *   outboundVoiceProfileID?: string,
     *   t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *   techPrefix?: string,
     *   timeout1xxSecs?: int,
     *   timeout2xxSecs?: int,
     * }|OutboundFqdn $outbound
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
        string $connectionName,
        bool $active = true,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        ?string $androidPushCredentialID = null,
        bool $callCostInWebhooks = false,
        bool $defaultOnHoldComfortNoiseEnabled = true,
        string|DtmfType $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        string|EncryptedMedia|null $encryptedMedia = null,
        array|InboundFqdn|null $inbound = null,
        ?string $iosPushCredentialID = null,
        bool $microsoftTeamsSbc = false,
        bool $onnetT38PassthroughEnabled = false,
        array|OutboundFqdn|null $outbound = null,
        array|ConnectionRtcpSettings|null $rtcpSettings = null,
        ?array $tags = null,
        string|TransportProtocol $transportProtocol = 'UDP',
        string|WebhookAPIVersion $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): FqdnConnectionNewResponse {
        $params = Util::removeNulls(
            [
                'connectionName' => $connectionName,
                'active' => $active,
                'anchorsiteOverride' => $anchorsiteOverride,
                'androidPushCredentialID' => $androidPushCredentialID,
                'callCostInWebhooks' => $callCostInWebhooks,
                'defaultOnHoldComfortNoiseEnabled' => $defaultOnHoldComfortNoiseEnabled,
                'dtmfType' => $dtmfType,
                'encodeContactHeaderEnabled' => $encodeContactHeaderEnabled,
                'encryptedMedia' => $encryptedMedia,
                'inbound' => $inbound,
                'iosPushCredentialID' => $iosPushCredentialID,
                'microsoftTeamsSbc' => $microsoftTeamsSbc,
                'onnetT38PassthroughEnabled' => $onnetT38PassthroughEnabled,
                'outbound' => $outbound,
                'rtcpSettings' => $rtcpSettings,
                'tags' => $tags,
                'transportProtocol' => $transportProtocol,
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
     * Retrieves the details of an existing FQDN connection.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnConnectionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing FQDN connection.
     *
     * @param string $id identifies the resource
     * @param bool $active Defaults to true
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'Sydney, Australia'|'Amsterdam, Netherlands'|'London, UK'|'Toronto, Canada'|'Vancouver, Canada'|'Frankfurt, Germany'|AnchorsiteOverride $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this connection
     * @param string $connectionName a user-assigned name to help manage the connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param 'SRTP'|EncryptedMedia|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param array{
     *   aniNumberFormat?: '+E.164'|'E.164'|'+E.164-national'|'E.164-national'|AniNumberFormat,
     *   channelLimit?: int|null,
     *   codecs?: list<string>,
     *   defaultPrimaryFqdnID?: string|null,
     *   defaultRoutingMethod?: 'sequential'|'round-robin'|DefaultRoutingMethod|null,
     *   defaultSecondaryFqdnID?: string|null,
     *   defaultTertiaryFqdnID?: string|null,
     *   dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *   generateRingbackTone?: bool,
     *   isupHeadersEnabled?: bool,
     *   prackEnabled?: bool,
     *   shakenStirEnabled?: bool,
     *   sipCompactHeadersEnabled?: bool,
     *   sipRegion?: 'US'|'Europe'|'Australia'|SipRegion,
     *   sipSubdomain?: string|null,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *   timeout1xxSecs?: int,
     *   timeout2xxSecs?: int,
     * }|InboundFqdn $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer that the sender and receiver negotiate T38 directly when both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call according to each leg's settings.
     * @param array{
     *   aniOverride?: string,
     *   aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int,
     *   encryptedMedia?: 'SRTP'|EncryptedMedia|null,
     *   generateRingbackTone?: bool,
     *   instantRingbackEnabled?: bool,
     *   ipAuthenticationMethod?: 'credential-authentication'|'ip-authentication'|IPAuthenticationMethod,
     *   ipAuthenticationToken?: string,
     *   localization?: string,
     *   outboundVoiceProfileID?: string,
     *   t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     *   techPrefix?: string,
     *   timeout1xxSecs?: int,
     *   timeout2xxSecs?: int,
     * }|OutboundFqdn $outbound
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
        array|InboundFqdn|null $inbound = null,
        ?string $iosPushCredentialID = null,
        bool $onnetT38PassthroughEnabled = false,
        array|OutboundFqdn|null $outbound = null,
        array|ConnectionRtcpSettings|null $rtcpSettings = null,
        ?array $tags = null,
        string|TransportProtocol $transportProtocol = 'UDP',
        string|WebhookAPIVersion $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): FqdnConnectionUpdateResponse {
        $params = Util::removeNulls(
            [
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
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your FQDN connections.
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
     * @return DefaultPagination<FqdnConnection>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort $sort = 'created_at',
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an FQDN connection.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FqdnConnectionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
