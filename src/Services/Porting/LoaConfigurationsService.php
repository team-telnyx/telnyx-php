<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\LoaConfigurationsContract;

final class LoaConfigurationsService implements LoaConfigurationsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a LOA configuration.
     *
     * @param array{
     *   address: array{
     *     city: string,
     *     countryCode: string,
     *     state: string,
     *     streetAddress: string,
     *     zipCode: string,
     *     extendedAddress?: string,
     *   },
     *   companyName: string,
     *   contact: array{email: string, phoneNumber: string},
     *   logo: array{documentID: string},
     *   name: string,
     * }|LoaConfigurationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|LoaConfigurationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationNewResponse {
        [$parsed, $options] = LoaConfigurationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<LoaConfigurationNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'porting/loa_configurations',
            body: (object) $parsed,
            options: $options,
            convert: LoaConfigurationNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific LOA configuration.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationGetResponse {
        /** @var BaseResponse<LoaConfigurationGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['porting/loa_configurations/%1$s', $id],
            options: $requestOptions,
            convert: LoaConfigurationGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific LOA configuration.
     *
     * @param array{
     *   address: array{
     *     city: string,
     *     countryCode: string,
     *     state: string,
     *     streetAddress: string,
     *     zipCode: string,
     *     extendedAddress?: string,
     *   },
     *   companyName: string,
     *   contact: array{email: string, phoneNumber: string},
     *   logo: array{documentID: string},
     *   name: string,
     * }|LoaConfigurationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|LoaConfigurationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationUpdateResponse {
        [$parsed, $options] = LoaConfigurationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<LoaConfigurationUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['porting/loa_configurations/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: LoaConfigurationUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List the LOA configurations.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|LoaConfigurationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|LoaConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationListResponse {
        [$parsed, $options] = LoaConfigurationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<LoaConfigurationListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'porting/loa_configurations',
            query: $parsed,
            options: $options,
            convert: LoaConfigurationListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific LOA configuration.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['porting/loa_configurations/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Preview the LOA template that would be generated without need to create LOA configuration.
     *
     * @param array{
     *   address: array{
     *     city: string,
     *     countryCode: string,
     *     state: string,
     *     streetAddress: string,
     *     zipCode: string,
     *     extendedAddress?: string,
     *   },
     *   companyName: string,
     *   contact: array{email: string, phoneNumber: string},
     *   logo: array{documentID: string},
     *   name: string,
     * }|LoaConfigurationPreview0Params $params
     *
     * @throws APIException
     */
    public function preview0(
        array|LoaConfigurationPreview0Params $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = LoaConfigurationPreview0Params::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<string> */
        $response = $this->client->request(
            method: 'post',
            path: 'porting/loa_configuration/preview',
            headers: ['Accept' => 'application/pdf'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Preview a specific LOA configuration.
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string {
        /** @var BaseResponse<string> */
        $response = $this->client->request(
            method: 'get',
            path: ['porting/loa_configurations/%1$s/preview', $id],
            headers: ['Accept' => 'application/pdf'],
            options: $requestOptions,
            convert: 'string',
        );

        return $response->parse();
    }
}
