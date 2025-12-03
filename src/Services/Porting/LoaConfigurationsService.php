<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;
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
     *     country_code: string,
     *     state: string,
     *     street_address: string,
     *     zip_code: string,
     *     extended_address?: string,
     *   },
     *   company_name: string,
     *   contact: array{email: string, phone_number: string},
     *   logo: array{document_id: string},
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

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param array{
     *   address: array{
     *     city: string,
     *     country_code: string,
     *     state: string,
     *     street_address: string,
     *     zip_code: string,
     *     extended_address?: string,
     *   },
     *   company_name: string,
     *   contact: array{email: string, phone_number: string},
     *   logo: array{document_id: string},
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

        // @phpstan-ignore-next-line;
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
     * @return DefaultPagination<PortingLoaConfiguration>
     *
     * @throws APIException
     */
    public function list(
        array|LoaConfigurationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = LoaConfigurationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'porting/loa_configurations',
            query: $parsed,
            options: $options,
            convert: PortingLoaConfiguration::class,
            page: DefaultPagination::class,
        );
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
        // @phpstan-ignore-next-line;
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
     *     country_code: string,
     *     state: string,
     *     street_address: string,
     *     zip_code: string,
     *     extended_address?: string,
     *   },
     *   company_name: string,
     *   contact: array{email: string, phone_number: string},
     *   logo: array{document_id: string},
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

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function preview1(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting/loa_configurations/%1$s/preview', $id],
            headers: ['Accept' => 'application/pdf'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
