<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListParams;
use Telnyx\ShortCodes\ShortCodeListResponse;
use Telnyx\ShortCodes\ShortCodeUpdateParams;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

interface ShortCodesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ShortCodeGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ShortCodeUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ShortCodeUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ShortCodeUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ShortCodeListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ShortCodeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ShortCodeListResponse;
}
