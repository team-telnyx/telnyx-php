<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\LoaConfigurationsContract;

final class LoaConfigurationsService implements LoaConfigurationsContract
{
    /**
     * @api
     */
    public LoaConfigurationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LoaConfigurationsRawService($client);
    }

    /**
     * @api
     *
     * Create a LOA configuration.
     *
     * @param array{
     *   city: string,
     *   countryCode: string,
     *   state: string,
     *   streetAddress: string,
     *   zipCode: string,
     *   extendedAddress?: string,
     * } $address The address of the company
     * @param string $companyName The name of the company
     * @param array{
     *   email: string, phoneNumber: string
     * } $contact The contact information of the company
     * @param array{documentID: string} $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     *
     * @throws APIException
     */
    public function create(
        array $address,
        string $companyName,
        array $contact,
        array $logo,
        string $name,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationNewResponse {
        $params = [
            'address' => $address,
            'companyName' => $companyName,
            'contact' => $contact,
            'logo' => $logo,
            'name' => $name,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     * @param array{
     *   city: string,
     *   countryCode: string,
     *   state: string,
     *   streetAddress: string,
     *   zipCode: string,
     *   extendedAddress?: string,
     * } $address The address of the company
     * @param string $companyName The name of the company
     * @param array{
     *   email: string, phoneNumber: string
     * } $contact The contact information of the company
     * @param array{documentID: string} $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array $address,
        string $companyName,
        array $contact,
        array $logo,
        string $name,
        ?RequestOptions $requestOptions = null,
    ): LoaConfigurationUpdateResponse {
        $params = [
            'address' => $address,
            'companyName' => $companyName,
            'contact' => $contact,
            'logo' => $logo,
            'name' => $name,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the LOA configurations.
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationListResponse {
        $params = ['page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Preview the LOA template that would be generated without need to create LOA configuration.
     *
     * @param array{
     *   city: string,
     *   countryCode: string,
     *   state: string,
     *   streetAddress: string,
     *   zipCode: string,
     *   extendedAddress?: string,
     * } $address The address of the company
     * @param string $companyName The name of the company
     * @param array{
     *   email: string, phoneNumber: string
     * } $contact The contact information of the company
     * @param array{documentID: string} $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
     *
     * @throws APIException
     */
    public function preview0(
        array $address,
        string $companyName,
        array $contact,
        array $logo,
        string $name,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = [
            'address' => $address,
            'companyName' => $companyName,
            'contact' => $contact,
            'logo' => $logo,
            'name' => $name,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->preview0(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Preview a specific LOA configuration.
     *
     * @param string $id identifies a LOA configuration
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->preview1($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
