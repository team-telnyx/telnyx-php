<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Audio\AudioTranscribeParams;
use Telnyx\AI\Audio\AudioTranscribeResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AudioRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AudioTranscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AudioTranscribeResponse>
     *
     * @throws APIException
     */
    public function transcribe(
        array|AudioTranscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
