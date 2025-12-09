<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplicationCreateParams;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationListParams;
use Telnyx\FaxApplications\FaxApplicationListParams\Sort;
use Telnyx\FaxApplications\FaxApplicationListResponse;
use Telnyx\FaxApplications\FaxApplicationNewResponse;
use Telnyx\FaxApplications\FaxApplicationUpdateParams;
use Telnyx\FaxApplications\FaxApplicationUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FaxApplicationsContract;

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
     * @param array{
     *   application_name: string,
     *   webhook_event_url: string,
     *   active?: bool,
     *   anchorsite_override?: value-of<AnchorsiteOverride>,
     *   inbound?: array{
     *     channel_limit?: int,
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *   },
     *   outbound?: array{channel_limit?: int, outbound_voice_profile_id?: string},
     *   tags?: list<string>,
     *   webhook_event_failover_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }|FaxApplicationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FaxApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationNewResponse {
        [$parsed, $options] = FaxApplicationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<FaxApplicationNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'fax_applications',
            body: (object) $parsed,
            options: $options,
            convert: FaxApplicationNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the details of an existing Fax Application inside the 'data' attribute of the response.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FaxApplicationGetResponse {
        /** @var BaseResponse<FaxApplicationGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['fax_applications/%1$s', $id],
            options: $requestOptions,
            convert: FaxApplicationGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates settings of an existing Fax Application based on the parameters of the request.
     *
     * @param array{
     *   application_name: string,
     *   webhook_event_url: string,
     *   active?: bool,
     *   anchorsite_override?: value-of<AnchorsiteOverride>,
     *   fax_email_recipient?: string|null,
     *   inbound?: array{
     *     channel_limit?: int,
     *     sip_subdomain?: string,
     *     sip_subdomain_receive_settings?: 'only_my_connections'|'from_anyone'|FaxApplicationUpdateParams\Inbound\SipSubdomainReceiveSettings,
     *   },
     *   outbound?: array{channel_limit?: int, outbound_voice_profile_id?: string},
     *   tags?: list<string>,
     *   webhook_event_failover_url?: string|null,
     *   webhook_timeout_secs?: int|null,
     * }|FaxApplicationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FaxApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationUpdateResponse {
        [$parsed, $options] = FaxApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<FaxApplicationUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['fax_applications/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: FaxApplicationUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint returns a list of your Fax Applications inside the 'data' attribute of the response. You can adjust which applications are listed by using filters. Fax Applications are used to configure how you send and receive faxes using the Programmable Fax API with Telnyx.
     *
     * @param array{
     *   filter?: array{
     *     application_name?: array{contains?: string},
     *     outbound_voice_profile_id?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'application_name'|'active'|Sort,
     * }|FaxApplicationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|FaxApplicationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): FaxApplicationListResponse {
        [$parsed, $options] = FaxApplicationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<FaxApplicationListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'fax_applications',
            query: $parsed,
            options: $options,
            convert: FaxApplicationListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes a Fax Application. Deletion may be prevented if the application is in use by phone numbers.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FaxApplicationDeleteResponse {
        /** @var BaseResponse<FaxApplicationDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['fax_applications/%1$s', $id],
            options: $requestOptions,
            convert: FaxApplicationDeleteResponse::class,
        );

        return $response->parse();
    }
}
