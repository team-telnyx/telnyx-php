<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Sqldbs;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Sqldbs\Actions\ActionQueryParams;
use Telnyx\Storage\Sqldbs\Actions\ActionQueryResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id SQL database ID
     * @param array<string,mixed>|ActionQueryParams $params
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
    ): BaseResponse;
}
