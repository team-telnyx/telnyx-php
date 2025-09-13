<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams\Page;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address as Address2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact as Contact2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo as Logo2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address as Address1;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact as Contact1;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo as Logo1;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\LoaConfigurationsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param Address $address the address of the company
     * @param string $companyName The name of the company
     * @param Contact $contact the contact information of the company
     * @param Logo $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     *
     * @return LoaConfigurationNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $address,
        $companyName,
        $contact,
        $logo,
        $name,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationNewResponse {
        $params = [
            'address' => $address,
            'companyName' => $companyName,
            'contact' => $contact,
            'logo' => $logo,
            'name' => $name,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return LoaConfigurationNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationNewResponse {
        [$parsed, $options] = LoaConfigurationCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @return LoaConfigurationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return LoaConfigurationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     * @param Address1 $address the address of the company
     * @param string $companyName The name of the company
     * @param Contact1 $contact the contact information of the company
     * @param Logo1 $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     *
     * @return LoaConfigurationUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $address,
        $companyName,
        $contact,
        $logo,
        $name,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationUpdateResponse {
        $params = [
            'address' => $address,
            'companyName' => $companyName,
            'contact' => $contact,
            'logo' => $logo,
            'name' => $name,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return LoaConfigurationUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationUpdateResponse {
        [$parsed, $options] = LoaConfigurationUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return LoaConfigurationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationListResponse {
        $params = ['page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return LoaConfigurationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationListResponse {
        [$parsed, $options] = LoaConfigurationListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
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
     * @param Address2 $address the address of the company
     * @param string $companyName The name of the company
     * @param Contact2 $contact the contact information of the company
     * @param Logo2 $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     *
     * @throws APIException
     */
    public function preview0(
        $address,
        $companyName,
        $contact,
        $logo,
        $name,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = [
            'address' => $address,
            'companyName' => $companyName,
            'contact' => $contact,
            'logo' => $logo,
            'name' => $name,
        ];

        return $this->preview0Raw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function preview0Raw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = LoaConfigurationPreview0Params::parseRequest(
            $params,
            $requestOptions
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
        $params = [];

        return $this->preview1Raw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function preview1Raw(
        string $id,
        mixed $params,
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
