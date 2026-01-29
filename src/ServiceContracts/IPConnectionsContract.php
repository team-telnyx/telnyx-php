<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\ConnectionNoiseSuppressionDetails;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\DefaultFlatPagination;
use Telnyx\IPConnections\InboundIP;
use Telnyx\IPConnections\IPConnection;
use Telnyx\IPConnections\IPConnectionCreateParams\Inbound;
use Telnyx\IPConnections\IPConnectionCreateParams\JitterBuffer;
use Telnyx\IPConnections\IPConnectionCreateParams\NoiseSuppression;
use Telnyx\IPConnections\IPConnectionCreateParams\TransportProtocol;
use Telnyx\IPConnections\IPConnectionCreateParams\WebhookAPIVersion;
use Telnyx\IPConnections\IPConnectionDeleteResponse;
use Telnyx\IPConnections\IPConnectionGetResponse;
use Telnyx\IPConnections\IPConnectionListParams\Filter;
use Telnyx\IPConnections\IPConnectionListParams\Sort;
use Telnyx\IPConnections\IPConnectionNewResponse;
use Telnyx\IPConnections\IPConnectionUpdateResponse;
use Telnyx\IPConnections\OutboundIP;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type InboundShape from \Telnyx\IPConnections\IPConnectionCreateParams\Inbound
 * @phpstan-import-type JitterBufferShape from \Telnyx\IPConnections\IPConnectionCreateParams\JitterBuffer
 * @phpstan-import-type InboundIPShape from \Telnyx\IPConnections\InboundIP
 * @phpstan-import-type JitterBufferShape from \Telnyx\IPConnections\IPConnectionUpdateParams\JitterBuffer as JitterBufferShape1
 * @phpstan-import-type FilterShape from \Telnyx\IPConnections\IPConnectionListParams\Filter
 * @phpstan-import-type ConnectionNoiseSuppressionDetailsShape from \Telnyx\ConnectionNoiseSuppressionDetails
 * @phpstan-import-type OutboundIPShape from \Telnyx\IPConnections\OutboundIP
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface IPConnectionsContract
{
    /**
     * @api
     *
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param Inbound|InboundShape $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param JitterBuffer|JitterBufferShape $jitterBuffer Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
     * @param NoiseSuppression|value-of<NoiseSuppression> $noiseSuppression Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape $noiseSuppressionDetails Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param OutboundIP|OutboundIPShape $outbound
     * @param ConnectionRtcpSettings|ConnectionRtcpSettingsShape $rtcpSettings
     * @param list<string> $tags tags associated with the connection
     * @param TransportProtocol|value-of<TransportProtocol> $transportProtocol One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?bool $active = null,
        AnchorsiteOverride|string $anchorsiteOverride = 'Latency',
        ?string $androidPushCredentialID = null,
        bool $callCostInWebhooks = false,
        ?string $connectionName = null,
        bool $defaultOnHoldComfortNoiseEnabled = true,
        DtmfType|string $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        EncryptedMedia|string|null $encryptedMedia = null,
        Inbound|array|null $inbound = null,
        ?string $iosPushCredentialID = null,
        JitterBuffer|array|null $jitterBuffer = null,
        NoiseSuppression|string|null $noiseSuppression = null,
        ConnectionNoiseSuppressionDetails|array|null $noiseSuppressionDetails = null,
        bool $onnetT38PassthroughEnabled = false,
        OutboundIP|array|null $outbound = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        ?array $tags = null,
        TransportProtocol|string $transportProtocol = 'UDP',
        WebhookAPIVersion|string $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): IPConnectionNewResponse;

    /**
     * @api
     *
     * @param string $id IP Connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): IPConnectionGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param InboundIP|InboundIPShape $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param \Telnyx\IPConnections\IPConnectionUpdateParams\JitterBuffer|JitterBufferShape1 $jitterBuffer Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
     * @param \Telnyx\IPConnections\IPConnectionUpdateParams\NoiseSuppression|value-of<\Telnyx\IPConnections\IPConnectionUpdateParams\NoiseSuppression> $noiseSuppression Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape $noiseSuppressionDetails Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param OutboundIP|OutboundIPShape $outbound
     * @param ConnectionRtcpSettings|ConnectionRtcpSettingsShape $rtcpSettings
     * @param list<string> $tags tags associated with the connection
     * @param \Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol|value-of<\Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol> $transportProtocol One of UDP, TLS, or TCP. Applies only to connections with IP authentication or FQDN authentication.
     * @param \Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion|value-of<\Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?bool $active = null,
        AnchorsiteOverride|string $anchorsiteOverride = 'Latency',
        ?string $androidPushCredentialID = null,
        bool $callCostInWebhooks = false,
        ?string $connectionName = null,
        bool $defaultOnHoldComfortNoiseEnabled = true,
        DtmfType|string $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        EncryptedMedia|string|null $encryptedMedia = null,
        InboundIP|array|null $inbound = null,
        ?string $iosPushCredentialID = null,
        \Telnyx\IPConnections\IPConnectionUpdateParams\JitterBuffer|array|null $jitterBuffer = null,
        \Telnyx\IPConnections\IPConnectionUpdateParams\NoiseSuppression|string|null $noiseSuppression = null,
        ConnectionNoiseSuppressionDetails|array|null $noiseSuppressionDetails = null,
        bool $onnetT38PassthroughEnabled = false,
        OutboundIP|array|null $outbound = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        ?array $tags = null,
        \Telnyx\IPConnections\IPConnectionUpdateParams\TransportProtocol|string $transportProtocol = 'UDP',
        \Telnyx\IPConnections\IPConnectionUpdateParams\WebhookAPIVersion|string $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): IPConnectionUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[connection_name], filter[fqdn], filter[outbound_voice_profile_id], filter[outbound.outbound_voice_profile_id]
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<IPConnection>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string $sort = 'created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): IPConnectionDeleteResponse;
}
