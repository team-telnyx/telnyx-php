<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignCreateParams;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignUpdateParams;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberCampaignsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberCampaignCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberCampaignCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberCampaignUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignPhoneNumber,
        array|PhoneNumberCampaignUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberCampaignListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PerPagePaginationV2<PhoneNumberCampaign>>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberCampaignListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
