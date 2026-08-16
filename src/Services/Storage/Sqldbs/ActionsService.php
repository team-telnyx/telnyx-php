<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage\Sqldbs;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\Sqldbs\ActionsContract;
use Telnyx\Storage\Sqldbs\Actions\ActionQueryResponse;

/**
 * Manage SQL databases and run SQL against them.
 *
 * @phpstan-import-type ParamShape from \Telnyx\Storage\Sqldbs\Actions\ActionQueryParams\Param
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Runs SQL against the database and returns the resulting rows — empty for statements that return none, such as DDL. Bind positional `?` placeholders with `params` rather than interpolating values into the SQL string.
     *
     * @param string $id SQL database ID
     * @param string $sql The SQL to run. Use positional `?` placeholders and supply the values in `params` rather than interpolating them into this string.
     * @param list<ParamShape> $params Positional bind parameters, in placeholder order. Each value is a string, a number, a boolean, or null; booleans are cast to `1`/`0`. The count must match the number of `?` placeholders exactly — a mismatch is rejected with 422 rather than binding null for the ones you left out. (Not enforced for multi-statement scripts or named parameters, where the placeholder count is not the number bound.)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function query(
        string $id,
        string $sql,
        ?array $params = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionQueryResponse {
        $params1 = Util::removeNulls(['sql' => $sql, 'params' => $params]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->query($id, params: $params1, requestOptions: $requestOptions);

        return $response->parse();
    }
}
