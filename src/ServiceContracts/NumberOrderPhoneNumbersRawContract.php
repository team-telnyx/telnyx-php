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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberOrderPhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderPhoneNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NumberOrderPhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderPhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The unique identifier of the number order phone number
     * @param array<string,mixed>|NumberOrderPhoneNumberUpdateRequirementGroupParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderPhoneNumberUpdateRequirementGroupResponse>
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|NumberOrderPhoneNumberUpdateRequirementGroupParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param array<string,mixed>|NumberOrderPhoneNumberUpdateRequirementsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberOrderPhoneNumberUpdateRequirementsResponse>
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        array|NumberOrderPhoneNumberUpdateRequirementsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
