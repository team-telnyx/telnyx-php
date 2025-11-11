<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Transcriptions\Json;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the recording transcription resource identified by its ID.
 *
 * @see Telnyx\Texml\Accounts\Transcriptions\Json->retrieveRecordingTranscriptionSidJson
 *
 * @phpstan-type JsonRetrieveRecordingTranscriptionSidJsonParamsShape = array{
 *   account_sid: string
 * }
 */
final class JsonRetrieveRecordingTranscriptionSidJsonParams implements BaseModel
{
    /** @use SdkModel<JsonRetrieveRecordingTranscriptionSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $account_sid;

    /**
     * `new JsonRetrieveRecordingTranscriptionSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JsonRetrieveRecordingTranscriptionSidJsonParams::with(account_sid: ...)
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
    public static function with(string $account_sid): self
    {
        $obj = new self;

        $obj->account_sid = $account_sid;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->account_sid = $accountSid;

        return $obj;
    }
}
