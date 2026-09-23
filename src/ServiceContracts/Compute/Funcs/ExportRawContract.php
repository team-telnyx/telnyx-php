<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Compute\Funcs;

use Telnyx\Compute\Funcs\Export\ExportCreateParams;
use Telnyx\Compute\Funcs\Export\FuncLogExportConfigResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ExportRawContract
{
    /**
     * @api
     *
     * @param string $id Function ID
     * @param array<string,mixed>|ExportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FuncLogExportConfigResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|ExportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FuncLogExportConfigResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Function ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
