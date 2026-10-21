<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Transcriptions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Transcriptions\Json\TexmlRecordingTranscription;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JsonContract
{
    /**
     * @api
     *
     * @param string $recordingTranscriptionSid uniquely identifies the recording transcription by id
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $recordingTranscriptionSid uniquely identifies the recording transcription by id
     * @param string $accountSid The UUID of the Telnyx account that owns the resource, for example `f5586561-8ff0-4291-a51b-c7dfe4139ff9`. The `account_sid` path segment is kept for Twilio API compatibility, but the value is a Telnyx account UUID, not a Twilio `AC...` SID. It must match the account that owns the API key used to authenticate the request, otherwise the endpoint returns `404`. The same value is sent as `AccountSid` in TeXML webhooks.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): TexmlRecordingTranscription;
}
