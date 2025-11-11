<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\RequestOptions;

interface NumberOrderPhoneNumbersContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|NumberOrderPhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberListResponse;

    /**
     * @api
     *
     * @param array<mixed>|NumberOrderPhoneNumberUpdateRequirementGroupParams $params
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        array|NumberOrderPhoneNumberUpdateRequirementGroupParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse;

    /**
     * @api
     *
     * @param array<mixed>|NumberOrderPhoneNumberUpdateRequirementsParams $params
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        array|NumberOrderPhoneNumberUpdateRequirementsParams $params,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse;
}
