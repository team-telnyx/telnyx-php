<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Recordings;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Recordings\Json\JsonDeleteRecordingSidJsonParams;
use Telnyx\Texml\Accounts\Recordings\Json\JsonRetrieveRecordingSidJsonParams;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JsonRawContract
{
    /**
     * @api
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param array<string,mixed>|JsonDeleteRecordingSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteRecordingSidJson(
        string $recordingSid,
        array|JsonDeleteRecordingSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $recordingSid uniquely identifies the recording by id
     * @param array<string,mixed>|JsonRetrieveRecordingSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlGetCallRecordingResponseBody>
     *
     * @throws APIException
     */
    public function retrieveRecordingSidJson(
        string $recordingSid,
        array|JsonRetrieveRecordingSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
