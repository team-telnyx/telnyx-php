<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

interface TextToSpeechContract
{
    /**
     * @api
     *
     * @param array<mixed>|TextToSpeechGenerateSpeechParams $params
     *
     * @throws APIException
     */
    public function generateSpeech(
        array|TextToSpeechGenerateSpeechParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|TextToSpeechListVoicesParams $params
     *
     * @throws APIException
     */
    public function listVoices(
        array|TextToSpeechListVoicesParams $params,
        ?RequestOptions $requestOptions = null,
    ): TextToSpeechListVoicesResponse;
}
