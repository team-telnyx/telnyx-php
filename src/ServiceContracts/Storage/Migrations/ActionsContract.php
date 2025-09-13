<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage\Migrations;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Storage\Migrations\Actions\ActionStopResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @return ActionStopResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stop(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionStopResponse;

    /**
     * @api
     *
     * @return ActionStopResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function stopRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionStopResponse;
}
