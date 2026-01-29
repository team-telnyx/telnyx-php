<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Faxes;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Faxes\Actions\ActionCancelResponse;
use Telnyx\Faxes\Actions\ActionRefreshResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cancel(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionCancelResponse;

    /**
     * @api
     *
     * @param string $id the unique identifier of a fax
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refresh(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRefreshResponse;
}
