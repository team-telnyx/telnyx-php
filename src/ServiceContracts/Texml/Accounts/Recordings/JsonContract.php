<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Recordings;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Recordings\Json\JsonDeleteRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Recordings\Json\JsonRetrieveRecordingSidJsonParams;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

interface JsonContract
{
    /**
     * @api
     *
     * @param array<mixed>|JsonDeleteRecordingSidJsonParams $params
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        array|JsonDeleteRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|JsonRetrieveRecordingSidJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        array|JsonRetrieveRecordingSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): TexmlGetCallRecordingResponseBody;
}
