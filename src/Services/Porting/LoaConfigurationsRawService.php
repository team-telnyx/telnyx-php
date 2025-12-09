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
use Telnyx\ServiceContracts\Porting\LoaConfigurationsRawContract;

final class LoaConfigurationsRawService implements LoaConfigurationsRawContract
{
    // @phpstan-ignore-next-line
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
     * @return BaseResponse<LoaConfigurationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LoaConfigurationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LoaConfigurationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'porting/loa_configurations',
            body: (object) $parsed,
            options: $options,
            convert: LoaConfigurationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     *
     * @return BaseResponse<LoaConfigurationGetResponse>
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
            path: ['porting/loa_configurations/%1$s', $id],
            options: $requestOptions,
            convert: LoaConfigurationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
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
     * @return BaseResponse<LoaConfigurationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|LoaConfigurationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LoaConfigurationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['porting/loa_configurations/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: LoaConfigurationUpdateResponse::class,
        );
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
     * @return BaseResponse<LoaConfigurationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|LoaConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LoaConfigurationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting/loa_configurations',
            query: $parsed,
            options: $options,
            convert: LoaConfigurationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     *
     * @return BaseResponse<mixed>
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
            path: ['porting/loa_configurations/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
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
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function preview0(
        array|LoaConfigurationPreview0Params $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LoaConfigurationPreview0Params::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'porting/loa_configuration/preview',
            headers: ['Accept' => 'application/pdf'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Preview a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting/loa_configurations/%1$s/preview', $id],
            headers: ['Accept' => 'application/pdf'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
