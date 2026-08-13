<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Storage\Sqldbs\SqlDatabase;
use Telnyx\Storage\Sqldbs\SqlDatabaseResponseWrapper;
use Telnyx\Storage\Sqldbs\SqldbListParams\FilterStatus;
use Telnyx\Storage\Sqldbs\SqldbListParams\Sort;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SqldbsContract
{
    /**
     * @api
     *
     * @param string $name Database name. Lowercase letters, numbers, and hyphens only; must start and end with a letter or number.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): SqlDatabaseResponseWrapper;

    /**
     * @api
     *
     * @param string $id SQL database ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SqlDatabaseResponseWrapper;

    /**
     * @api
     *
     * @param string $filterName filter by exact name match
     * @param FilterStatus|value-of<FilterStatus> $filterStatus filter by provisioning status
     * @param int $pageNumber the page number to load
     * @param int $pageSize The size of the page. Values above 250 are treated as 250.
     * @param Sort|value-of<Sort> $sort sort field; prefix with `-` for descending order
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<SqlDatabase>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        FilterStatus|string|null $filterStatus = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id SQL database ID
     * @param bool $force Delete the database even when functions still bind it. Their bindings stop resolving.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        bool $force = false,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
