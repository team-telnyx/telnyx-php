<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\FqdnConnections;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationListResponse;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FqdnAuthenticationRawContract
{
    /**
     * @api
     *
     * @param string $fqdnConnectionID the ID of the FQDN connection
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FqdnAuthenticationListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $fqdnConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fqdnConnectionID the ID of the FQDN connection
     * @param array<string,mixed>|FqdnAuthenticationPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FqdnAuthenticationPatchAllResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        string $fqdnConnectionID,
        array|FqdnAuthenticationPatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
