<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Sqldbs;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Sqldbs\ActionsRawContract;
use Telnyx\Storage\Sqldbs\Actions\ActionQueryParams;
use Telnyx\Storage\Sqldbs\Actions\ActionQueryResponse;

/**
 * Manage SQL databases and run SQL against them.
 *
 * @phpstan-import-type ParamShape from \Telnyx\Storage\Sqldbs\Actions\ActionQueryParams\Param
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Runs SQL against the database and returns the resulting rows — empty for statements that return none, such as DDL. Bind positional `?` placeholders with `params` rather than interpolating values into the SQL string.
     *
     * @param string $id SQL database ID
     * @param array{sql: string, params?: list<ParamShape>}|ActionQueryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionQueryResponse>
     *
     * @throws APIException
     */
    public function query(
        string $id,
        array|ActionQueryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionQueryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['storage/sqldbs/%1$s/actions/query', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionQueryResponse::class,
        );
    }
}
