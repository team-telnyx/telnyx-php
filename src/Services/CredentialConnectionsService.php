<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\ConnectionNoiseSuppressionDetails;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\CredentialConnection;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\JitterBuffer;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\NoiseSuppression;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\WebhookAPIVersion;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Filter;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Sort;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\CredentialConnections\CredentialInbound;
use Telnyx\CredentialConnections\CredentialOutbound;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CredentialConnectionsContract;
use Telnyx\Services\CredentialConnections\ActionsService;

/**
 * @phpstan-import-type JitterBufferShape from \Telnyx\CredentialConnections\CredentialConnectionCreateParams\JitterBuffer
 * @phpstan-import-type JitterBufferShape from \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\JitterBuffer as JitterBufferShape1
 * @phpstan-import-type FilterShape from \Telnyx\CredentialConnections\CredentialConnectionListParams\Filter
 * @phpstan-import-type CredentialInboundShape from \Telnyx\CredentialConnections\CredentialInbound
 * @phpstan-import-type ConnectionNoiseSuppressionDetailsShape from \Telnyx\ConnectionNoiseSuppressionDetails
 * @phpstan-import-type CredentialOutboundShape from \Telnyx\CredentialConnections\CredentialOutbound
 * @phpstan-import-type ConnectionRtcpSettingsShape from \Telnyx\CredentialConnections\ConnectionRtcpSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CredentialConnectionsService implements CredentialConnectionsContract
{
    /**
     * @api
     */
    public CredentialConnectionsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CredentialConnectionsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a credential connection.
     *
     * @param string $connectionName a user-assigned name to help manage the connection
     * @param string $password The password to be used as part of the credentials. Must be 8 to 128 characters long.
     * @param string $userName The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters).
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param bool $callCostInWebhooks specifies if call cost webhooks should be sent for this connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param CredentialInbound|CredentialInboundShape $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param JitterBuffer|JitterBufferShape $jitterBuffer Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
     * @param NoiseSuppression|value-of<NoiseSuppression> $noiseSuppression Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape $noiseSuppressionDetails Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param CredentialOutbound|CredentialOutboundShape $outbound
     * @param ConnectionRtcpSettings|ConnectionRtcpSettingsShape $rtcpSettings
     * @param SipUriCallingPreference|value-of<SipUriCallingPreference> $sipUriCallingPreference This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     * @param list<string> $tags tags associated with the connection
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion Determines which webhook format will be used, Telnyx API v1, v2 or texml. Note - texml can only be set when the outbound object parameter call_parking_enabled is included and set to true.
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $connectionName,
        string $password,
        string $userName,
        ?bool $active = null,
        AnchorsiteOverride|string $anchorsiteOverride = 'Latency',
        ?string $androidPushCredentialID = null,
        bool $callCostInWebhooks = false,
        bool $defaultOnHoldComfortNoiseEnabled = false,
        DtmfType|string $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        EncryptedMedia|string|null $encryptedMedia = null,
        CredentialInbound|array|null $inbound = null,
        ?string $iosPushCredentialID = null,
        JitterBuffer|array|null $jitterBuffer = null,
        NoiseSuppression|string|null $noiseSuppression = null,
        ConnectionNoiseSuppressionDetails|array|null $noiseSuppressionDetails = null,
        bool $onnetT38PassthroughEnabled = false,
        CredentialOutbound|array|null $outbound = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        SipUriCallingPreference|string|null $sipUriCallingPreference = null,
        ?array $tags = null,
        WebhookAPIVersion|string $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): CredentialConnectionNewResponse {
        $params = Util::removeNulls(
            [
                'connectionName' => $connectionName,
                'password' => $password,
                'userName' => $userName,
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
                'jitterBuffer' => $jitterBuffer,
                'noiseSuppression' => $noiseSuppression,
                'noiseSuppressionDetails' => $noiseSuppressionDetails,
                'onnetT38PassthroughEnabled' => $onnetT38PassthroughEnabled,
                'outbound' => $outbound,
                'rtcpSettings' => $rtcpSettings,
                'sipUriCallingPreference' => $sipUriCallingPreference,
                'tags' => $tags,
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
     * Retrieves the details of an existing credential connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CredentialConnectionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing credential connection.
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
     * @param CredentialInbound|CredentialInboundShape $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\JitterBuffer|JitterBufferShape1 $jitterBuffer Configuration options for Jitter Buffer. Enables Jitter Buffer for RTP streams of SIP Trunking calls. The feature is off unless enabled. You may define min and max values in msec for customized buffering behaviors. Larger values add latency but tolerate more jitter, while smaller values reduce latency but are more sensitive to jitter and reordering.
     * @param \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\NoiseSuppression|value-of<\Telnyx\CredentialConnections\CredentialConnectionUpdateParams\NoiseSuppression> $noiseSuppression Controls when noise suppression is applied to calls. When set to 'inbound', noise suppression is applied to incoming audio. When set to 'outbound', it's applied to outgoing audio. When set to 'both', it's applied in both directions. When set to 'disabled', noise suppression is turned off.
     * @param ConnectionNoiseSuppressionDetails|ConnectionNoiseSuppressionDetailsShape $noiseSuppressionDetails Configuration options for noise suppression. These settings are stored regardless of the noise_suppression value, but only take effect when noise_suppression is not 'disabled'. If you disable noise suppression and later re-enable it, the previously configured settings will be used.
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param CredentialOutbound|CredentialOutboundShape $outbound
     * @param string $password The password to be used as part of the credentials. Must be 8 to 128 characters long.
     * @param ConnectionRtcpSettings|ConnectionRtcpSettingsShape $rtcpSettings
     * @param \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\SipUriCallingPreference|value-of<\Telnyx\CredentialConnections\CredentialConnectionUpdateParams\SipUriCallingPreference> $sipUriCallingPreference This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     * @param list<string> $tags tags associated with the connection
     * @param string $userName The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters).
     * @param \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\WebhookAPIVersion|value-of<\Telnyx\CredentialConnections\CredentialConnectionUpdateParams\WebhookAPIVersion> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
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
        bool $defaultOnHoldComfortNoiseEnabled = false,
        DtmfType|string $dtmfType = 'RFC 2833',
        bool $encodeContactHeaderEnabled = false,
        EncryptedMedia|string|null $encryptedMedia = null,
        CredentialInbound|array|null $inbound = null,
        ?string $iosPushCredentialID = null,
        \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\JitterBuffer|array|null $jitterBuffer = null,
        \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\NoiseSuppression|string|null $noiseSuppression = null,
        ConnectionNoiseSuppressionDetails|array|null $noiseSuppressionDetails = null,
        bool $onnetT38PassthroughEnabled = false,
        CredentialOutbound|array|null $outbound = null,
        ?string $password = null,
        ConnectionRtcpSettings|array|null $rtcpSettings = null,
        \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\SipUriCallingPreference|string|null $sipUriCallingPreference = null,
        ?array $tags = null,
        ?string $userName = null,
        \Telnyx\CredentialConnections\CredentialConnectionUpdateParams\WebhookAPIVersion|string $webhookAPIVersion = '1',
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): CredentialConnectionUpdateResponse {
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
                'jitterBuffer' => $jitterBuffer,
                'noiseSuppression' => $noiseSuppression,
                'noiseSuppressionDetails' => $noiseSuppressionDetails,
                'onnetT38PassthroughEnabled' => $onnetT38PassthroughEnabled,
                'outbound' => $outbound,
                'password' => $password,
                'rtcpSettings' => $rtcpSettings,
                'sipUriCallingPreference' => $sipUriCallingPreference,
                'tags' => $tags,
                'userName' => $userName,
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
     * Returns a list of your credential connections.
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
     * @return DefaultFlatPagination<CredentialConnection>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string $sort = 'created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an existing credential connection.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CredentialConnectionDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
