<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams\Page;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
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
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): LoaConfigurationNewResponse;

    /**
     * @api
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
     * @param Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address $address the address of the company
     * @param string $companyName The name of the company
     * @param Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact $contact the contact information of the company
     * @param Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo $logo The logo of the LOA configuration
     * @param string $name The name of the LOA configuration
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
     * @param Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address $address the address of the company
     * @param string $companyName The name of the company
     * @param Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact $contact the contact information of the company
     * @param Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo $logo The logo of the LOA configuration
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
}
