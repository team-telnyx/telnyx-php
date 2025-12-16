<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\RequestOptions;

interface NumberOrderPhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     *
     * @return BaseResponse<NumberOrderPhoneNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NumberOrderPhoneNumberListParams $params
     *
     * @return BaseResponse<NumberOrderPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The unique identifier of the number order phone number
     * @param array<string,mixed>|NumberOrderPhoneNumberUpdateRequirementGroupParams $params
     *
     * @return BaseResponse<NumberOrderPhoneNumberUpdateRequirementGroupResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|NumberOrderPhoneNumberUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param array<string,mixed>|NumberOrderPhoneNumberUpdateRequirementsParams $params
     *
     * @return BaseResponse<NumberOrderPhoneNumberUpdateRequirementsResponse>
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        array|NumberOrderPhoneNumberUpdateRequirementsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
