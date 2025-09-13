<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Recordings;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

interface JsonContract
{
    /**
     * @api
     *
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRecordingSidJsonRaw(
        string $recordingSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): TexmlGetCallRecordingResponseBody;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJsonRaw(
        string $recordingSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): TexmlGetCallRecordingResponseBody;
}
