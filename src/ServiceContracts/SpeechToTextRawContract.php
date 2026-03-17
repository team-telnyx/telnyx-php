<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpeechToTextRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SpeechToTextTranscribeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function transcribe(
        array|SpeechToTextTranscribeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
