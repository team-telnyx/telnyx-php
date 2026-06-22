<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SpeechToText\SpeechToTextListProvidersParams;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse;
use Telnyx\SpeechToText\SpeechToTextRetrieveTranscriptionParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpeechToTextRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SpeechToTextListProvidersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpeechToTextListProvidersResponse>
     *
     * @throws APIException
     */
    public function listProviders(
        array|SpeechToTextListProvidersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SpeechToTextRetrieveTranscriptionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveTranscription(
        array|SpeechToTextRetrieveTranscriptionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
