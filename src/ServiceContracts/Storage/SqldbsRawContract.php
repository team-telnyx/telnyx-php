<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Storage\Sqldbs\SqlDatabase;
use Telnyx\Storage\Sqldbs\SqlDatabaseResponseWrapper;
use Telnyx\Storage\Sqldbs\SqldbCreateParams;
use Telnyx\Storage\Sqldbs\SqldbDeleteParams;
use Telnyx\Storage\Sqldbs\SqldbListParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SqldbsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SqldbCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SqlDatabaseResponseWrapper>
     *
     * @throws APIException
     */
    public function create(
        array|SqldbCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id SQL database ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SqlDatabaseResponseWrapper>
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
     * @param array<string,mixed>|SqldbListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SqlDatabase>>
     *
     * @throws APIException
     */
    public function list(
        array|SqldbListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id SQL database ID
     * @param array<string,mixed>|SqldbDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|SqldbDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
