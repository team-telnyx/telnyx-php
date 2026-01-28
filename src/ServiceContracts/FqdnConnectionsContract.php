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
use Telnyx\FqdnConnections\FqdnConnection;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams\JitterBuffer;
use Telnyx\FqdnConnections\FqdnConnectionCreateParams\NoiseSuppression;
use Telnyx\FqdnConnections\FqdnConnectionDeleteResponse;
use Telnyx\FqdnConnections\FqdnConnectionGetResponse;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Filter;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Sort;
use Telnyx\FqdnConnections\FqdnConnectionNewResponse;
use Telnyx\FqdnConnections\FqdnConnectionUpdateResponse;
use Telnyx\FqdnConnections\InboundFqdn;
use Telnyx\FqdnConnections\OutboundFqdn;
use Telnyx\FqdnConnections\TransportProtocol;
use Telnyx\FqdnConnections\WebhookAPIVersion;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type JitterBufferShape from \Telnyx\FqdnConnections\FqdnConnectionCreateParams\JitterBuffer
 * @phpstan-import-type JitterBufferShape from \Telnyx\FqdnConnections\FqdnConnectionUpdateParams\JitterBuffer as JitterBufferShape1
 * @phpstan-import-type FilterShape from \Telnyx\FqdnConnections\FqdnConnectionListParams\Filter
 * @phpstan-import-type InboundFqdnShape from \Telnyx\FqdnConnections\InboundFqdn
 * @phpstan-import-type ConnectionNoiseSuppressionDetailsShape from \Telnyx\ConnectionNoiseSuppressionDetails
 * @phpstan-import-type OutboundFqdnShape from \Telnyx\FqdnConnections\OutboundFqdn
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FqdnConnectionsContract
{
    /**
     * @api
     *
     * @param string $connectionName a user-assigned name to help manage the connection
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param InboundFqdn|InboundFqdnShape $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param JitterBuffer|JitterBufferShape $jitterBuffer Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
     * @param bool $microsoftTeamsSbc When enabled, the connection will be created for Microsoft Teams Direct Routing. A *.mstsbc.telnyx.tech FQDN will be created for the connection automatically.
     * @param NoiseSuppression|value-of<NoiseSuppression> $noiseSuppression Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape $noiseSuppressionDetails Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param OutboundFqdn|OutboundFqdnShape $outbound
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
        string $connectionName,
        bool $active = true,
        AnchorsiteOverride|string $anchorsiteOverride = 'Latency',
        ?string $androidPushCredentialID = null,
        bool $callCostInWebhooks = false,
        bool $defaultOnHoldComfortNoiseEnabled = true,
        DtmfType|string $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        EncryptedMedia|string|null $encryptedMedia = null,
        InboundFqdn|array|null $inbound = null,
        ?string $iosPushCredentialID = null,
        JitterBuffer|array|null $jitterBuffer = null,
        bool $microsoftTeamsSbc = false,
        NoiseSuppression|string|null $noiseSuppression = null,
        ConnectionNoiseSuppressionDetails|array|null $noiseSuppressionDetails = null,
        bool $onnetT38PassthroughEnabled = false,
        OutboundFqdn|array|null $outbound = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        ?array $tags = null,
        TransportProtocol|string $transportProtocol = 'UDP',
        WebhookAPIVersion|string $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): FqdnConnectionNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FqdnConnectionGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this connection
     * @param string $connectionName a user-assigned name to help manage the connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param InboundFqdn|InboundFqdnShape $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param \Telnyx\FqdnConnections\FqdnConnectionUpdateParams\JitterBuffer|JitterBufferShape1 $jitterBuffer Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
     * @param \Telnyx\FqdnConnections\FqdnConnectionUpdateParams\NoiseSuppression|value-of<\Telnyx\FqdnConnections\FqdnConnectionUpdateParams\NoiseSuppression> $noiseSuppression Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape $noiseSuppressionDetails Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer that the sender and receiver negotiate T38 directly when both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call according to each leg's settings.
     * @param OutboundFqdn|OutboundFqdnShape $outbound
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
        InboundFqdn|array|null $inbound = null,
        ?string $iosPushCredentialID = null,
        \Telnyx\FqdnConnections\FqdnConnectionUpdateParams\JitterBuffer|array|null $jitterBuffer = null,
        \Telnyx\FqdnConnections\FqdnConnectionUpdateParams\NoiseSuppression|string|null $noiseSuppression = null,
        ConnectionNoiseSuppressionDetails|array|null $noiseSuppressionDetails = null,
        bool $onnetT38PassthroughEnabled = false,
        OutboundFqdn|array|null $outbound = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        ?array $tags = null,
        TransportProtocol|string $transportProtocol = 'UDP',
        WebhookAPIVersion|string $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): FqdnConnectionUpdateResponse;

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
     * @return DefaultFlatPagination<FqdnConnection>
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): FqdnConnectionDeleteResponse;
}
