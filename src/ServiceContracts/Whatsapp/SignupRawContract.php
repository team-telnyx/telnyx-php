<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\Signup\SignupGetStatusResponse;
use Telnyx\Whatsapp\Signup\SignupListParams;
use Telnyx\Whatsapp\Signup\SignupListResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SignupRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SignupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SignupListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|SignupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Signup session ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SignupGetStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
