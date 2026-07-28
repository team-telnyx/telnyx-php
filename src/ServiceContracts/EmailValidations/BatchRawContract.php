<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailValidations;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailValidations\Batch\BatchCreateParams;
use Telnyx\EmailValidations\Batch\BatchGetResponse;
use Telnyx\EmailValidations\Batch\BatchNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id email validation batch UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
