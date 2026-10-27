<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BrowserSessions;

use Telnyx\BrowserSessions\Actions\ActionCreateParams;
use Telnyx\BrowserSessions\Actions\ActionGetResponse;
use Telnyx\BrowserSessions\Actions\ActionNewResponse;
use Telnyx\BrowserSessions\Actions\ActionRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id Path param
     * @param array<string,mixed>|ActionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|ActionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $actionID,
        array|ActionRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
