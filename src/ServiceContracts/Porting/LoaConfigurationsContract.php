<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams\Page;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address as Address2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact as Contact2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo as Logo2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address as Address1;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact as Contact1;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo as Logo1;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface LoaConfigurationsContract
{
    /**
     * @api
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
    ): LoaConfigurationNewResponse;

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
    ): LoaConfigurationNewResponse;

    /**
     * @api
     *
     * @return LoaConfigurationGetResponse<HasRawResponse>
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
     * @return LoaConfigurationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationGetResponse;

    /**
     * @api
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
    ): LoaConfigurationUpdateResponse;

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
    ): LoaConfigurationUpdateResponse;

    /**
     * @api
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
    ): LoaConfigurationListResponse;

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
    ): LoaConfigurationListResponse;

    /**
     * @api
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
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
    ): string;

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
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function preview1(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function preview1Raw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): string;
}
