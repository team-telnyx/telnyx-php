<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\DefaultPagination;
use Telnyx\FaxApplications\FaxApplication;
use Telnyx\FaxApplications\FaxApplicationCreateParams;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound\SipSubdomainReceiveSettings;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationListParams;
use Telnyx\FaxApplications\FaxApplicationListParams\Sort;
use Telnyx\FaxApplications\FaxApplicationNewResponse;
use Telnyx\FaxApplications\FaxApplicationUpdateParams;
use Telnyx\FaxApplications\FaxApplicationUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FaxApplicationsRawContract;

final class FaxApplicationsRawService implements FaxApplicationsRawContract
{
    // @phpstan-ignore-next-line
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
     *   applicationName: string,
     *   webhookEventURL: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   inbound?: array{
     *     channelLimit?: int,
     *     sipSubdomain?: string,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *   },
     *   outbound?: array{channelLimit?: int, outboundVoiceProfileID?: string},
     *   tags?: list<string>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|FaxApplicationCreateParams $params
     *
     * @return BaseResponse<FaxApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FaxApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FaxApplicationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     *
     * @return BaseResponse<FaxApplicationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param array{
     *   applicationName: string,
     *   webhookEventURL: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   faxEmailRecipient?: string|null,
     *   inbound?: array{
     *     channelLimit?: int,
     *     sipSubdomain?: string,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|FaxApplicationUpdateParams\Inbound\SipSubdomainReceiveSettings,
     *   },
     *   outbound?: array{channelLimit?: int, outboundVoiceProfileID?: string},
     *   tags?: list<string>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|FaxApplicationUpdateParams $params
     *
     * @return BaseResponse<FaxApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FaxApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FaxApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{
     *     applicationName?: array{contains?: string}, outboundVoiceProfileID?: string
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'created_at'|'application_name'|'active'|Sort,
     * }|FaxApplicationListParams $params
     *
     * @return BaseResponse<DefaultPagination<FaxApplication>>
     *
     * @throws APIException
     */
    public function list(
        array|FaxApplicationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FaxApplicationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'fax_applications',
            query: $parsed,
            options: $options,
            convert: FaxApplication::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a Fax Application. Deletion may be prevented if the application is in use by phone numbers.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<FaxApplicationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['fax_applications/%1$s', $id],
            options: $requestOptions,
            convert: FaxApplicationDeleteResponse::class,
        );
    }
}
