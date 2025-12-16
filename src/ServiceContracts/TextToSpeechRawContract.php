<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

interface TextToSpeechRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TextToSpeechGenerateSpeechParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function generateSpeech(
        array|TextToSpeechGenerateSpeechParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TextToSpeechListVoicesParams $params
     *
     * @return BaseResponse<TextToSpeechListVoicesResponse>
     *
     * @throws APIException
     */
    public function listVoices(
        array|TextToSpeechListVoicesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
