<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TextToSpeech\TextToSpeechGenerateParams;
use Telnyx\TextToSpeech\TextToSpeechGenerateResponse;
use Telnyx\TextToSpeech\TextToSpeechListVoicesParams;
use Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;
use Telnyx\TextToSpeech\TextToSpeechStreamParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TextToSpeechRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TextToSpeechGenerateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TextToSpeechGenerateResponse>
     *
     * @throws APIException
     */
    public function generate(
        array|TextToSpeechGenerateParams $params,
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
     * @param array<string,mixed>|TextToSpeechStreamParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function stream(
        array|TextToSpeechStreamParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
