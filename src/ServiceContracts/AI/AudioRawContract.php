<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Audio\AudioTranscribeParams;
use Telnyx\AI\Audio\AudioTranscribeResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AudioRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AudioTranscribeParams $params
     *
     * @return BaseResponse<AudioTranscribeResponse>
     *
     * @throws APIException
     */
    public function transcribe(
        array|AudioTranscribeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
