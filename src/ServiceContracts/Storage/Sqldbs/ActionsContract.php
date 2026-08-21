<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Sqldbs;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Sqldbs\Actions\ActionQueryResponse;

/**
 * @phpstan-import-type ParamShape from \Telnyx\Storage\Sqldbs\Actions\ActionQueryParams\Param
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id SQL database ID
     * @param string $sql The SQL to run. Use positional `?` placeholders and supply the values in `params` rather than interpolating them into this string.
     * @param list<ParamShape|null> $params Positional bind parameters, in placeholder order. Each value is a string, a number, a boolean, or null; booleans are cast to `1`/`0`. The count must match the number of `?` placeholders exactly — a mismatch is rejected with 422 rather than binding null for the ones you left out. (Not enforced for multi-statement scripts or named parameters, where the placeholder count is not the number bound.)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function query(
        string $id,
        string $sql,
        ?array $params = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionQueryResponse;
}
