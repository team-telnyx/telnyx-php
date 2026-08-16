<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\SqldbsRawContract;
use Telnyx\Storage\Sqldbs\SqlDatabase;
use Telnyx\Storage\Sqldbs\SqlDatabaseResponseWrapper;
use Telnyx\Storage\Sqldbs\SqldbCreateParams;
use Telnyx\Storage\Sqldbs\SqldbDeleteParams;
use Telnyx\Storage\Sqldbs\SqldbListParams;
use Telnyx\Storage\Sqldbs\SqldbListParams\FilterStatus;
use Telnyx\Storage\Sqldbs\SqldbListParams\Sort;

/**
 * Manage SQL databases and run SQL against them.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SqldbsRawService implements SqldbsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new SQL database. Provisioning is asynchronous: the database is returned with status `pending` and becomes usable once it reaches `provision_ok`.
     *
     * @param array{name: string}|SqldbCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SqlDatabaseResponseWrapper>
     *
     * @throws APIException
     */
    public function create(
        array|SqldbCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SqldbCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'storage/sqldbs',
            body: (object) $parsed,
            options: $options,
            convert: SqlDatabaseResponseWrapper::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a SQL database by its ID, including its provisioning status.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['storage/sqldbs/%1$s', $id],
            options: $requestOptions,
            convert: SqlDatabaseResponseWrapper::class,
        );
    }

    /**
     * @api
     *
     * Lists the SQL databases for the authenticated user's organization. Results use page-based pagination (`page[number]`/`page[size]`) and can be filtered and sorted.
     *
     * @param array{
     *   filterName?: string,
     *   filterStatus?: FilterStatus|value-of<FilterStatus>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|SqldbListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SqlDatabase>>
     *
     * @throws APIException
     */
    public function list(
        array|SqldbListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SqldbListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'storage/sqldbs',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterName' => 'filter[name]',
                    'filterStatus' => 'filter[status]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: SqlDatabase::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a SQL database and all of the data it holds. Deletion is asynchronous and returns `202` with an empty body — the record is not removed synchronously. Poll `GET /storage/sqldbs/{id}`, which returns `404` once the database has been purged; there is no durable `deleted` state. A database still bound by a function is refused with `409` unless `force=true`.
     *
     * @param string $id SQL database ID
     * @param array{force?: bool}|SqldbDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SqldbDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['storage/sqldbs/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
