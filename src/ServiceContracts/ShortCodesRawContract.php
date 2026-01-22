<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ShortCode;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListParams;
use Telnyx\ShortCodes\ShortCodeUpdateParams;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ShortCodesRawContract
{
    /**
     * @api
     *
     * @param string $id The id of the short code
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ShortCodeGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the short code
     * @param array<string,mixed>|ShortCodeUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ShortCodeUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ShortCodeUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ShortCodeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<ShortCode>>
     *
     * @throws APIException
     */
    public function list(
        array|ShortCodeListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
