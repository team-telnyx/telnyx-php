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

interface PhoneNumberCampaignsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberCampaignCreateParams $params
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
     * @param array<string,mixed>|PhoneNumberCampaignUpdateParams $params
     *
     * @return BaseResponse<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function update(
        string $campaignPhoneNumber,
        array|PhoneNumberCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberCampaignListParams $params
     *
     * @return BaseResponse<PerPagePaginationV2<PhoneNumberCampaign>>
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
