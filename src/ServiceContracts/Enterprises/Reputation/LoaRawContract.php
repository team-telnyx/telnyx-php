<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\EnterpriseReputationPublicWrapped;
use Telnyx\Enterprises\Reputation\Loa\LoaRenderParams;
use Telnyx\Enterprises\Reputation\Loa\LoaUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface LoaRawContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|LoaUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseReputationPublicWrapped>
     *
     * @throws APIException
     */
    public function update(
        string $enterpriseID,
        array|LoaUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|LoaRenderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function render(
        string $enterpriseID,
        array|LoaRenderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
