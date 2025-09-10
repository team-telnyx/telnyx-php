<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Transcriptions\Json;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new JsonRetrieveRecordingTranscriptionSidJsonParams); // set properties as needed
 * $client->texml.accounts.transcriptions.json->retrieveRecordingTranscriptionSidJson(...$params->toArray());
 * ```
 * Returns the recording transcription resource identified by its ID.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->texml.accounts.transcriptions.json->retrieveRecordingTranscriptionSidJson(...$params->toArray());`
 *
 * @see Telnyx\Texml\Accounts\Transcriptions\Json->retrieveRecordingTranscriptionSidJson
 *
 * @phpstan-type json_retrieve_recording_transcription_sid_json_params = array{
 *   accountSid: string
 * }
 */
final class JsonRetrieveRecordingTranscriptionSidJsonParams implements BaseModel
{
    /** @use SdkModel<json_retrieve_recording_transcription_sid_json_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * `new JsonRetrieveRecordingTranscriptionSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JsonRetrieveRecordingTranscriptionSidJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JsonRetrieveRecordingTranscriptionSidJsonParams)->withAccountSid(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $accountSid): self
    {
        $obj = new self;

        $obj->accountSid = $accountSid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }
}
