<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams;
use Telnyx\VerifiedNumbers\VerifiedNumberListResponse;
use Telnyx\VerifiedNumbers\VerifiedNumberNewResponse;

interface VerifiedNumbersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|VerifiedNumberCreateParams $params
     *
     * @return BaseResponse<VerifiedNumberNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VerifiedNumberCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @return BaseResponse<VerifiedNumberDataWrapper>
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
     * @param array<mixed>|VerifiedNumberListParams $params
     *
     * @return BaseResponse<VerifiedNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|VerifiedNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @return BaseResponse<VerifiedNumberDataWrapper>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
