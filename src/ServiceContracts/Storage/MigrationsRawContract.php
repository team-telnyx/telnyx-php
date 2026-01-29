<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Migrations\MigrationCreateParams;
use Telnyx\Storage\Migrations\MigrationGetResponse;
use Telnyx\Storage\Migrations\MigrationListResponse;
use Telnyx\Storage\Migrations\MigrationNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MigrationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MigrationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MigrationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the data migration
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationGetResponse>
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
