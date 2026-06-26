<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\Dir;
use Telnyx\Dir\DirWrapped;
use Telnyx\Enterprises\Dir\DirCreateParams;
use Telnyx\Enterprises\Dir\DirListParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DirRawContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|DirCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirWrapped>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array|DirCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|DirListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Dir>>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        array|DirListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
