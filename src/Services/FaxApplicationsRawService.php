<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\DefaultFlatPagination;
use Telnyx\FaxApplications\FaxApplication;
use Telnyx\FaxApplications\FaxApplicationCreateParams;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound;
use Telnyx\FaxApplications\FaxApplicationCreateParams\Outbound;
use Telnyx\FaxApplications\FaxApplicationDeleteResponse;
use Telnyx\FaxApplications\FaxApplicationGetResponse;
use Telnyx\FaxApplications\FaxApplicationListParams;
use Telnyx\FaxApplications\FaxApplicationListParams\Filter;
use Telnyx\FaxApplications\FaxApplicationListParams\Sort;
use Telnyx\FaxApplications\FaxApplicationNewResponse;
use Telnyx\FaxApplications\FaxApplicationUpdateParams;
use Telnyx\FaxApplications\FaxApplicationUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FaxApplicationsRawContract;

/**
 * Fax Applications operations.
 *
 * @phpstan-import-type InboundShape from \Telnyx\FaxApplications\FaxApplicationCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\FaxApplications\FaxApplicationCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\FaxApplications\FaxApplicationUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type OutboundShape from \Telnyx\FaxApplications\FaxApplicationUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type FilterShape from \Telnyx\FaxApplications\FaxApplicationListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   inbound?: Inbound|InboundShape,
     *   outbound?: Outbound|OutboundShape,
     *   tags?: list<string>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|FaxApplicationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FaxApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FaxApplicationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FaxApplicationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     *   inbound?: FaxApplicationUpdateParams\Inbound|InboundShape1,
     *   outbound?: FaxApplicationUpdateParams\Outbound|OutboundShape1,
     *   tags?: list<string>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|FaxApplicationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FaxApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|FaxApplicationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|FaxApplicationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<FaxApplication>>
     *
     * @throws APIException
     */
    public function list(
        array|FaxApplicationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FaxApplicationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'fax_applications',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: FaxApplication::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a Fax Application. Deletion may be prevented if the application is in use by phone numbers.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FaxApplicationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
