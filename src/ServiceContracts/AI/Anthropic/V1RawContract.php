<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Anthropic;

use Telnyx\AI\Anthropic\V1\V1MessagesParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface V1RawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|V1MessagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function messages(
        array|V1MessagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
