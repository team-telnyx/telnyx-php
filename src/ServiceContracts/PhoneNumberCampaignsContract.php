<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaign;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignCreateParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListResponse;
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
        string $phoneNumber,
        array|PhoneNumberCampaignUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaign;

    /**
     * @api
     *
     * @param array<mixed>|PhoneNumberCampaignListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberCampaignListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberCampaignListResponse;

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
