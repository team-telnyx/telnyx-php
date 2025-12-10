<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PhoneNumberCampaigns\PhoneNumberCampaignCreateParams;
use Telnyx\Number10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams;
use Telnyx\Number10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListResponse;
use Telnyx\Number10dlc\PhoneNumberCampaigns\PhoneNumberCampaignUpdateParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\RequestOptions;

interface PhoneNumberCampaignsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberCampaignCreateParams $params
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberCampaignCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberCampaignUpdateParams $params
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber_,
        array|PhoneNumberCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberCampaignListParams $params
     *
     * @return BaseResponse<PhoneNumberCampaignListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
