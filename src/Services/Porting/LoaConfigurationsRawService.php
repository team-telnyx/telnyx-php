<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\LoaConfigurationsRawContract;

/**
 * @phpstan-import-type AddressShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address
 * @phpstan-import-type ContactShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact
 * @phpstan-import-type LogoShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo
 * @phpstan-import-type AddressShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address as AddressShape1
 * @phpstan-import-type ContactShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact as ContactShape1
 * @phpstan-import-type LogoShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo as LogoShape1
 * @phpstan-import-type AddressShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address as AddressShape2
 * @phpstan-import-type ContactShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact as ContactShape2
 * @phpstan-import-type LogoShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo as LogoShape2
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   address: Address|AddressShape,
     *   companyName: string,
     *   contact: Contact|ContactShape,
     *   logo: Logo|LogoShape,
     *   name: string,
     * }|LoaConfigurationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LoaConfigurationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LoaConfigurationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LoaConfigurationGetResponse>
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
     *   address: LoaConfigurationUpdateParams\Address|AddressShape1,
     *   companyName: string,
     *   contact: LoaConfigurationUpdateParams\Contact|ContactShape1,
     *   logo: LoaConfigurationUpdateParams\Logo|LogoShape1,
     *   name: string,
     * }|LoaConfigurationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LoaConfigurationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|LoaConfigurationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   pageNumber?: int, pageSize?: int
     * }|LoaConfigurationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortingLoaConfiguration>>
     *
     * @throws APIException
     */
    public function list(
        array|LoaConfigurationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LoaConfigurationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting/loa_configurations',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PortingLoaConfiguration::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
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
     *   address: LoaConfigurationPreview0Params\Address|AddressShape2,
     *   companyName: string,
     *   contact: LoaConfigurationPreview0Params\Contact|ContactShape2,
     *   logo: LoaConfigurationPreview0Params\Logo|LogoShape2,
     *   name: string,
     * }|LoaConfigurationPreview0Params $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function preview0(
        array|LoaConfigurationPreview0Params $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
