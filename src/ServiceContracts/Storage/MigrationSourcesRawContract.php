<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams;
use Telnyx\Storage\MigrationSources\MigrationSourceDeleteResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceGetResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceListResponse;
use Telnyx\Storage\MigrationSources\MigrationSourceNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MigrationSourcesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MigrationSourceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationSourceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MigrationSourceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the data migration source
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationSourceGetResponse>
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
     * @return BaseResponse<MigrationSourceListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier for the data migration source
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MigrationSourceDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
