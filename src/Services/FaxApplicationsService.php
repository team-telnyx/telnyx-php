<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplicationCreateParams;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Outbound;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationListParams;
use Telnyx\FaxApplications\FaxApplicationListParams\Filter;
use Telnyx\FaxApplications\FaxApplicationListParams\Page;
use Telnyx\FaxApplications\FaxApplicationListParams\Sort;
use Telnyx\FaxApplications\FaxApplicationListResponse;
use Telnyx\FaxApplications\FaxApplicationNewResponse;
use Telnyx\FaxApplications\FaxApplicationUpdateParams;
use Telnyx\FaxApplications\FaxApplicationUpdateParams\Inbound as Inbound1;
use Telnyx\FaxApplications\FaxApplicationUpdateParams\Outbound as Outbound1;
use Telnyx\FaxApplications\FaxApplicationUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FaxApplicationsContract;

use const Telnyx\Core\OMIT as omit;

final class FaxApplicationsService implements FaxApplicationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new Fax Application based on the parameters sent in the request. The application name and webhook URL are required. Once created, you can assign phone numbers to your application using the `/phone_numbers` endpoint.
     *
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param Inbound $inbound
     * @param Outbound $outbound
     * @param list<string> $tags tags associated with the Fax Application
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @return FaxApplicationNewResponse<HasRawResponse>
     */
    public function create(
        $applicationName,
        $webhookEventURL,
        $active = omit,
        $anchorsiteOverride = omit,
        $inbound = omit,
        $outbound = omit,
        $tags = omit,
        $webhookEventFailoverURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationNewResponse {
        [$parsed, $options] = FaxApplicationCreateParams::parseRequest(
            [
                'applicationName' => $applicationName,
                'webhookEventURL' => $webhookEventURL,
                'active' => $active,
                'anchorsiteOverride' => $anchorsiteOverride,
                'inbound' => $inbound,
                'outbound' => $outbound,
                'tags' => $tags,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'fax_applications',
            body: (object) $parsed,
            options: $options,
            convert: FaxApplicationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the details of an existing Fax Application inside the 'data' attribute of the response.
     *
     * @return FaxApplicationGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FaxApplicationGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['fax_applications/%1$s', $id],
            options: $requestOptions,
            convert: FaxApplicationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing Fax Application based on the parameters of the request.
     *
     * @param string $applicationName a user-assigned name to help manage the application
     * @param string $webhookEventURL The URL where webhooks related to this connection will be sent. Must include a scheme, such as 'https'.
     * @param bool $active specifies whether the connection can be used
     * @param AnchorsiteOverride|value-of<AnchorsiteOverride> $anchorsiteOverride `Latency` directs Telnyx to route media through the site with the lowest round-trip time to the user's connection. Telnyx calculates this time using ICMP ping messages. This can be disabled by specifying a site to handle all media.
     * @param string|null $faxEmailRecipient Specifies an email address where faxes sent to this application will be forwarded to (as pdf or tiff attachments)
     * @param Inbound1 $inbound
     * @param Outbound1 $outbound
     * @param list<string> $tags tags associated with the Fax Application
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this connection will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @return FaxApplicationUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $applicationName,
        $webhookEventURL,
        $active = omit,
        $anchorsiteOverride = omit,
        $faxEmailRecipient = omit,
        $inbound = omit,
        $outbound = omit,
        $tags = omit,
        $webhookEventFailoverURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationUpdateResponse {
        [$parsed, $options] = FaxApplicationUpdateParams::parseRequest(
            [
                'applicationName' => $applicationName,
                'webhookEventURL' => $webhookEventURL,
                'active' => $active,
                'anchorsiteOverride' => $anchorsiteOverride,
                'faxEmailRecipient' => $faxEmailRecipient,
                'inbound' => $inbound,
                'outbound' => $outbound,
                'tags' => $tags,
                'webhookEventFailoverURL' => $webhookEventFailoverURL,
                'webhookTimeoutSecs' => $webhookTimeoutSecs,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['fax_applications/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: FaxApplicationUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint returns a list of your Fax Applications inside the 'data' attribute of the response. You can adjust which applications are listed by using filters. Fax Applications are used to configure how you send and receive faxes using the Programmable Fax API with Telnyx.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound_voice_profile_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
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
     * @return FaxApplicationListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationListResponse {
        [$parsed, $options] = FaxApplicationListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'fax_applications',
            query: $parsed,
            options: $options,
            convert: FaxApplicationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a Fax Application. Deletion may be prevented if the application is in use by phone numbers.
     *
     * @return FaxApplicationDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FaxApplicationDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['fax_applications/%1$s', $id],
            options: $requestOptions,
            convert: FaxApplicationDeleteResponse::class,
        );
    }
}
