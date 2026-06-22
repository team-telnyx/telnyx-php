<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reputation;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberWithReputation;
use Telnyx\Reputation\Numbers\NumberListParams;
use Telnyx\Reputation\Numbers\NumberRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param array<string,mixed>|NumberRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationPhoneNumberWithReputation>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        array|NumberRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ReputationPhoneNumber>>
     *
     * @throws APIException
     */
    public function list(
        array|NumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
