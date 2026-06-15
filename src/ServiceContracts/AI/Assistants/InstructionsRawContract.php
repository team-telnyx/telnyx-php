<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Instructions\InstructionEnhanceParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InstructionsRawContract
{
    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param array<string,mixed>|InstructionEnhanceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function enhance(
        string $assistantID,
        array|InstructionEnhanceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
