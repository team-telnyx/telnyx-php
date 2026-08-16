<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\SqldbsContract;
use Telnyx\Services\Storage\Sqldbs\ActionsService;
use Telnyx\Storage\Sqldbs\SqlDatabase;
use Telnyx\Storage\Sqldbs\SqlDatabaseResponseWrapper;
use Telnyx\Storage\Sqldbs\SqldbListParams\FilterStatus;
use Telnyx\Storage\Sqldbs\SqldbListParams\Sort;

/**
 * Manage SQL databases and run SQL against them.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SqldbsService implements SqldbsContract
{
    /**
     * @api
     */
    public SqldbsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SqldbsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a new SQL database. Provisioning is asynchronous: the database is returned with status `pending` and becomes usable once it reaches `provision_ok`.
     *
     * @param string $name Database name. Lowercase letters, numbers, and hyphens only; must start and end with a letter or number.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): SqlDatabaseResponseWrapper {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a SQL database by its ID, including its provisioning status.
     *
     * @param string $id SQL database ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SqlDatabaseResponseWrapper {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the SQL databases for the authenticated user's organization. Results use page-based pagination (`page[number]`/`page[size]`) and can be filtered and sorted.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterName' => $filterName,
                'filterStatus' => $filterStatus,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a SQL database and all of the data it holds. Deletion is asynchronous and returns `202` with an empty body — the record is not removed synchronously. Poll `GET /storage/sqldbs/{id}`, which returns `404` once the database has been purged; there is no durable `deleted` state. A database still bound by a function is refused with `409` unless `force=true`.
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
    ): mixed {
        $params = Util::removeNulls(['force' => $force]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
