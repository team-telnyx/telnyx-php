<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\ConnectionRtcpSettings;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\SipUriCallingPreference;
use Telnyx\CredentialConnections\CredentialConnectionCreateParams\WebhookAPIVersion;
use Telnyx\CredentialConnections\CredentialConnectionDeleteResponse;
use Telnyx\CredentialConnections\CredentialConnectionGetResponse;
use Telnyx\CredentialConnections\CredentialConnectionListParams;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Filter;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Page;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Sort;
use Telnyx\CredentialConnections\CredentialConnectionListResponse;
use Telnyx\CredentialConnections\CredentialConnectionNewResponse;
use Telnyx\CredentialConnections\CredentialConnectionUpdateParams;
use Telnyx\CredentialConnections\CredentialConnectionUpdateParams\SipUriCallingPreference as SipUriCallingPreference1;
use Telnyx\CredentialConnections\CredentialConnectionUpdateParams\WebhookAPIVersion as WebhookAPIVersion1;
use Telnyx\CredentialConnections\CredentialConnectionUpdateResponse;
use Telnyx\CredentialConnections\CredentialInbound;
use Telnyx\CredentialConnections\CredentialOutbound;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\CredentialConnections\EncryptedMedia;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CredentialConnectionsContract;
use Telnyx\Services\CredentialConnections\ActionsService;

use const Telnyx\Core\OMIT as omit;

final class CredentialConnectionsService implements CredentialConnectionsContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($this->client);
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
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param CredentialInbound $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param CredentialOutbound $outbound
     * @param ConnectionRtcpSettings $rtcpSettings
     * @param SipUriCallingPreference|value-of<SipUriCallingPreference> $sipUriCallingPreference This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     * @param list<string> $tags tags associated with the connection
     * @param WebhookAPIVersion|value-of<WebhookAPIVersion> $webhookAPIVersion Determines which webhook format will be used, Telnyx API v1, v2 or texml. Note - texml can only be set when the outbound object parameter call_parking_enabled is included and set to true.
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     */
    public function create(
        $connectionName,
        $password,
        $userName,
        $active = omit,
        $anchorsiteOverride = omit,
        $androidPushCredentialID = omit,
        $defaultOnHoldComfortNoiseEnabled = omit,
        $dtmfType = omit,
        $encodeContactHeaderEnabled = omit,
        $encryptedMedia = omit,
        $inbound = omit,
        $iosPushCredentialID = omit,
        $onnetT38PassthroughEnabled = omit,
        $outbound = omit,
        $rtcpSettings = omit,
        $sipUriCallingPreference = omit,
        $tags = omit,
        $webhookAPIVersion = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionNewResponse {
        [$parsed, $options] = CredentialConnectionCreateParams::parseRequest(
            [
                'connectionName' => $connectionName,
                'password' => $password,
                'userName' => $userName,
                'active' => $active,
                'anchorsiteOverride' => $anchorsiteOverride,
                'androidPushCredentialID' => $androidPushCredentialID,
                'defaultOnHoldComfortNoiseEnabled' => $defaultOnHoldComfortNoiseEnabled,
                'dtmfType' => $dtmfType,
                'encodeContactHeaderEnabled' => $encodeContactHeaderEnabled,
                'encryptedMedia' => $encryptedMedia,
                'inbound' => $inbound,
                'iosPushCredentialID' => $iosPushCredentialID,
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
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'credential_connections',
            body: (object) $parsed,
            options: $options,
            convert: CredentialConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing credential connection.
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CredentialConnectionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['credential_connections/%1$s', $id],
            options: $requestOptions,
            convert: CredentialConnectionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing credential connection.
     *
     * @param bool $active Defaults to true
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $androidPushCredentialID The uuid of the push credential for Android
     * @param string $connectionName a user-assigned name to help manage the connection
     * @param bool $defaultOnHoldComfortNoiseEnabled When enabled, Telnyx will generate comfort noise when you place the call on hold. If disabled, you will need to generate comfort noise or on hold music to avoid RTP timeout.
     * @param DtmfType|value-of<DtmfType> $dtmfType Sets the type of DTMF digits sent from Telnyx to this Connection. Note that DTMF digits sent to Telnyx will be accepted in all formats.
     * @param bool $encodeContactHeaderEnabled encode the SIP contact header sent by Telnyx to avoid issues for NAT or ALG scenarios
     * @param EncryptedMedia|value-of<EncryptedMedia>|null $encryptedMedia Enable use of SRTP for encryption. Cannot be set if the transport_portocol is TLS.
     * @param CredentialInbound $inbound
     * @param string|null $iosPushCredentialID The uuid of the push credential for Ios
     * @param bool $onnetT38PassthroughEnabled Enable on-net T38 if you prefer the sender and receiver negotiating T38 directly if both are on the Telnyx network. If this is disabled, Telnyx will be able to use T38 on just one leg of the call depending on each leg's settings.
     * @param CredentialOutbound $outbound
     * @param string $password The password to be used as part of the credentials. Must be 8 to 128 characters long.
     * @param ConnectionRtcpSettings $rtcpSettings
     * @param SipUriCallingPreference1|value-of<SipUriCallingPreference1> $sipUriCallingPreference This feature enables inbound SIP URI calls to your Credential Auth Connection. If enabled for all (unrestricted) then anyone who calls the SIP URI <your-username>@telnyx.com will be connected to your Connection. You can also choose to allow only calls that are originated on any Connections under your account (internal).
     * @param list<string> $tags tags associated with the connection
     * @param string $userName The user name to be used as part of the credentials. Must be 4-32 characters long and alphanumeric values only (no spaces or special characters).
     * @param WebhookAPIVersion1|value-of<WebhookAPIVersion1> $webhookAPIVersion determines which webhook format will be used, Telnyx API v1 or v2
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
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
        $password = omit,
        $rtcpSettings = omit,
        $sipUriCallingPreference = omit,
        $tags = omit,
        $userName = omit,
        $webhookAPIVersion = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionUpdateResponse {
        [$parsed, $options] = CredentialConnectionUpdateParams::parseRequest(
            [
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
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['credential_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CredentialConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your credential connections.
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
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): CredentialConnectionListResponse {
        [$parsed, $options] = CredentialConnectionListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'credential_connections',
            query: $parsed,
            options: $options,
            convert: CredentialConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing credential connection.
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CredentialConnectionDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['credential_connections/%1$s', $id],
            options: $requestOptions,
            convert: CredentialConnectionDeleteResponse::class,
        );
    }
}
