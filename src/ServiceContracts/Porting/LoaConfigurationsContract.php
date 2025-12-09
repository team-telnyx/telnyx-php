<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\RequestOptions;

interface LoaConfigurationsContract
{
    /**
     * @api
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
    ): LoaConfigurationNewResponse;

    /**
     * @api
     *
     * @param string $id identifies a LOA configuration
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationGetResponse;

    /**
     * @api
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
    ): LoaConfigurationUpdateResponse;

    /**
     * @api
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
    ): LoaConfigurationListResponse;

    /**
     * @api
     *
     * @param string $id identifies a LOA configuration
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): string;

    /**
     * @api
     *
     * @param string $id identifies a LOA configuration
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;
}
