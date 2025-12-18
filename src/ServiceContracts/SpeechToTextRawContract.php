<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SpeechToText\SpeechToTextTranscribeParams;

interface SpeechToTextRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SpeechToTextTranscribeParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function transcribe(
        array|SpeechToTextTranscribeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
