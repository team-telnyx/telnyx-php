<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallReasons\CallReasonListParams;
use Telnyx\CallReasons\CallReasonListResponse;
use Telnyx\CallReasons\CallReasonValidateParams;
use Telnyx\CallReasons\CallReasonValidateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallReasonsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CallReasonListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<CallReasonListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CallReasonListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallReasonValidateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallReasonValidateResponse>
     *
     * @throws APIException
     */
    public function validate(
        array|CallReasonValidateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
