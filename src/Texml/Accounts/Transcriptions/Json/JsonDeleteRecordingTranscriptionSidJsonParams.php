<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Transcriptions\Json;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Permanently deletes a recording transcription.
 *
 * @see Telnyx\Services\Texml\Accounts\Transcriptions\JsonService::deleteRecordingTranscriptionSidJson()
 *
 * @phpstan-type JsonDeleteRecordingTranscriptionSidJsonParamsShape = array{
 *   accountSid: string
 * }
 */
final class JsonDeleteRecordingTranscriptionSidJsonParams implements BaseModel
{
    /** @use SdkModel<JsonDeleteRecordingTranscriptionSidJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * `new JsonDeleteRecordingTranscriptionSidJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JsonDeleteRecordingTranscriptionSidJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JsonDeleteRecordingTranscriptionSidJsonParams)->withAccountSid(...)
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
        $self = new self;

        $self['accountSid'] = $accountSid;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }
}
