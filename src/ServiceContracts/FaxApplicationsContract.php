<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\DefaultPagination;
use Telnyx\FaxApplications\FaxApplication;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationListParams\Sort;
use Telnyx\FaxApplications\FaxApplicationNewResponse;
use Telnyx\FaxApplications\FaxApplicationUpdateResponse;
use Telnyx\RequestOptions;

interface FaxApplicationsContract
{
    /**
     * @api
     *
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'Sydney, Australia'|'Amsterdam, Netherlands'|'London, UK'|'Toronto, Canada'|'Vancouver, Canada'|'Frankfurt, Germany'|AnchorsiteOverride $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param array{
     *   channelLimit?: int,
     *   sipSubdomain?: string,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     * } $inbound
     * @param array{channelLimit?: int, outboundVoiceProfileID?: string} $outbound
     * @param list<string> $tags tags associated with the Fax Application
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function create(
        string $applicationName,
        string $webhookEventURL,
        bool $active = true,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        ?array $inbound = null,
        ?array $outbound = null,
        array $tags = [],
        ?string $webhookEventFailoverURL = '',
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationNewResponse;

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
    ): FaxApplicationGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param 'Latency'|'Chicago, IL'|'Ashburn, VA'|'San Jose, CA'|'Sydney, Australia'|'Amsterdam, Netherlands'|'London, UK'|'Toronto, Canada'|'Vancouver, Canada'|'Frankfurt, Germany'|AnchorsiteOverride $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $faxEmailRecipient Specifies an email address where faxes sent to this application will be forwarded to (as pdf or tiff attachments)
     * @param array{
     *   channelLimit?: int,
     *   sipSubdomain?: string,
     *   sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|\Telnyx\FaxApplications\FaxApplicationUpdateParams\Inbound\SipSubdomainReceiveSettings,
     * } $inbound
     * @param array{channelLimit?: int, outboundVoiceProfileID?: string} $outbound
     * @param list<string> $tags tags associated with the Fax Application
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $applicationName,
        string $webhookEventURL,
        bool $active = true,
        string|AnchorsiteOverride $anchorsiteOverride = 'Latency',
        ?string $faxEmailRecipient = null,
        ?array $inbound = null,
        ?array $outbound = null,
        ?array $tags = null,
        ?string $webhookEventFailoverURL = '',
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   applicationName?: array{contains?: string}, outboundVoiceProfileID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound_voice_profile_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param 'created_at'|'application_name'|'active'|Sort $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>application_name</code>: sorts the result by the
     *     <code>application_name</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-application_name</code>: sorts the result by the
     *     <code>application_name</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     *
     * @return DefaultPagination<FaxApplication>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort $sort = 'created_at',
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

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
    ): FaxApplicationDeleteResponse;
}
