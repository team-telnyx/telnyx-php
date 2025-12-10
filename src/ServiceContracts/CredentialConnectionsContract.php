<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\ConnectionRtcpSettings\Port;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\WebhookAPIVersion;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Sort;
use Telnyx\CredentialConnections\CredentialConnectionListResponse;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\CredentialConnections\CredentialInbound;
use Telnyx\CredentialConnections\CredentialInbound\AniNumberFormat;
use Telnyx\CredentialConnections\CredentialInbound\DnisNumberFormat;
use Telnyx\CredentialConnections\CredentialOutbound;
use Telnyx\CredentialConnections\CredentialOutbound\AniOverrideType;
use Telnyx\CredentialConnections\CredentialOutbound\T38ReinviteSource;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\RequestOptions;

interface CredentialConnectionsContract
{
    /**
     * @api
     *
     * @param string $connectionName a user-assigned name to help manage the connection
     * @param string $password The password to be used as part of the credentials. Must be 8 to 128 characters long.
     * @param string $userName The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters).
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
     *   dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *   generateRingbackTone?: bool,
     *   isupHeadersEnabled?: bool,
     *   prackEnabled?: bool,
     *   shakenStirEnabled?: bool,
     *   sipCompactHeadersEnabled?: bool,
     *   timeout1xxSecs?: int,
     *   timeout2xxSecs?: int,
     * }|CredentialInbound $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param array{
     *   aniOverride?: string,
     *   aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int,
     *   generateRingbackTone?: bool,
     *   instantRingbackEnabled?: bool,
     *   localization?: string,
     *   outboundVoiceProfileID?: string,
     *   t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     * }|CredentialOutbound $outbound
     * @param array{
     *   captureEnabled?: bool,
     *   port?: 'rtcp-mux'|'rtp+1'|Port,
     *   reportFrequencySecs?: int,
     * }|ConnectionRtcpSettings $rtcpSettings
     * @param 'disabled'|'unrestricted'|'internal'|SipUriCallingPreference $sipUriCallingPreference This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     * @param list<string> $tags tags associated with the connection
     * @param '1'|'2'|'texml'|WebhookAPIVersion $webhookAPIVersion Determines which webhook format will be used, Telnyx API v1, v2 or texml. Note - texml can only be set when the outbound object parameter call_parking_enabled is included and set to true.
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function create(
        string $connectionName,
        string $password,
        string $userName,
        ?bool $active = null,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        ?string $androidPushCredentialID = null,
        bool $callCostInWebhooks = false,
        bool $defaultOnHoldComfortNoiseEnabled = false,
        string|DtmfType $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        string|EncryptedMedia|null $encryptedMedia = null,
        array|CredentialInbound|null $inbound = null,
        ?string $iosPushCredentialID = null,
        bool $onnetT38PassthroughEnabled = false,
        array|CredentialOutbound|null $outbound = null,
        array|ConnectionRtcpSettings|null $rtcpSettings = null,
        string|SipUriCallingPreference|null $sipUriCallingPreference = null,
        ?array $tags = null,
        string|WebhookAPIVersion $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CredentialConnectionGetResponse;

    /**
     * @api
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
     *   channelLimit?: int,
     *   codecs?: list<string>,
     *   dnisNumberFormat?: '+e164'|'e164'|'national'|'sip_username'|DnisNumberFormat,
     *   generateRingbackTone?: bool,
     *   isupHeadersEnabled?: bool,
     *   prackEnabled?: bool,
     *   shakenStirEnabled?: bool,
     *   sipCompactHeadersEnabled?: bool,
     *   timeout1xxSecs?: int,
     *   timeout2xxSecs?: int,
     * }|CredentialInbound $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param array{
     *   aniOverride?: string,
     *   aniOverrideType?: 'always'|'normal'|'emergency'|AniOverrideType,
     *   callParkingEnabled?: bool|null,
     *   channelLimit?: int,
     *   generateRingbackTone?: bool,
     *   instantRingbackEnabled?: bool,
     *   localization?: string,
     *   outboundVoiceProfileID?: string,
     *   t38ReinviteSource?: 'telnyx'|'customer'|'disabled'|'passthru'|'caller-passthru'|'callee-passthru'|T38ReinviteSource,
     * }|CredentialOutbound $outbound
     * @param string $password The password to be used as part of the credentials. Must be 8 to 128 characters long.
     * @param array{
     *   captureEnabled?: bool,
     *   port?: 'rtcp-mux'|'rtp+1'|Port,
     *   reportFrequencySecs?: int,
     * }|ConnectionRtcpSettings $rtcpSettings
     * @param 'disabled'|'unrestricted'|'internal'|\Telnyx\CredentialConnections\CredentialConnectionUpdateParams\SipUriCallingPreference $sipUriCallingPreference This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     * @param list<string> $tags tags associated with the connection
     * @param string $userName The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters).
     * @param '1'|'2'|\Telnyx\CredentialConnections\CredentialConnectionUpdateParams\WebhookAPIVersion $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
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
        bool $defaultOnHoldComfortNoiseEnabled = false,
        string|DtmfType $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        string|EncryptedMedia|null $encryptedMedia = null,
        array|CredentialInbound|null $inbound = null,
        ?string $iosPushCredentialID = null,
        bool $onnetT38PassthroughEnabled = false,
        array|CredentialOutbound|null $outbound = null,
        ?string $password = null,
        array|ConnectionRtcpSettings|null $rtcpSettings = null,
        string|\Telnyx\CredentialConnections\CredentialConnectionUpdateParams\SipUriCallingPreference|null $sipUriCallingPreference = null,
        ?array $tags = null,
        ?string $userName = null,
        string|\Telnyx\CredentialConnections\CredentialConnectionUpdateParams\WebhookAPIVersion $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionUpdateResponse;

    /**
     * @api
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
    ): CredentialConnectionListResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CredentialConnectionDeleteResponse;
}
