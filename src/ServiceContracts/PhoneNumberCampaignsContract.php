<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PerPagePaginationV2;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignCreateParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignUpdateParams;
use Telnyx\RequestOptions;

interface PhoneNumberCampaignsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberCampaignCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PhoneNumberCampaignCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberCampaignUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $campaignPhoneNumber,
        array|PhoneNumberCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberCampaignListParams $params
     *
     * @return PerPagePaginationV2<PhoneNumberCampaign>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PerPagePaginationV2;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberCampaign;
}
