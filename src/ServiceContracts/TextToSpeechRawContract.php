<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechResponse;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;
use Telnyx\TextToSpeech\TextToSpeechRetrieveSpeechParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TextToSpeechRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TextToSpeechGenerateSpeechParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TextToSpeechGenerateSpeechResponse>
     *
     * @throws APIException
     */
    public function generateSpeech(
        array|TextToSpeechGenerateSpeechParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TextToSpeechListVoicesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TextToSpeechListVoicesResponse>
     *
     * @throws APIException
     */
    public function listVoices(
        array|TextToSpeechListVoicesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TextToSpeechRetrieveSpeechParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveSpeech(
        array|TextToSpeechRetrieveSpeechParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
