<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Migrations;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Migrations\Actions\ActionStopResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id unique identifier for the data migration
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionStopResponse>
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
