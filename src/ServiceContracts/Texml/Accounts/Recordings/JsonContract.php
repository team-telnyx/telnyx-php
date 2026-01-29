<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Recordings;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JsonContract
{
    /**
     * @api
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): TexmlGetCallRecordingResponseBody;
}
