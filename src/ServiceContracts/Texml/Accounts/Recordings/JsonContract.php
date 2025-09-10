<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Recordings;

use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

interface JsonContract
{
    /**
     * @api
     *
     * @param string $accountSid
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $accountSid
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): TexmlGetCallRecordingResponseBody;
}
