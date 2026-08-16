<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\RecordingAvailableWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Available recording types.
 *
 * @phpstan-type DataShape = array{recordingTypes: list<string>, sessionID: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Available recording types.
     *
     * @var list<string> $recordingTypes
     */
    #[Required('recording_types', list: 'string')]
    public array $recordingTypes;

    /**
     * The meeting session this event belongs to.
     */
    #[Required('session_id')]
    public string $sessionID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(recordingTypes: ..., sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withRecordingTypes(...)->withSessionID(...)
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
     *
     * @param list<string> $recordingTypes
     */
    public static function with(array $recordingTypes, string $sessionID): self
    {
        $self = new self;

        $self['recordingTypes'] = $recordingTypes;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * Available recording types.
     *
     * @param list<string> $recordingTypes
     */
    public function withRecordingTypes(array $recordingTypes): self
    {
        $self = clone $this;
        $self['recordingTypes'] = $recordingTypes;

        return $self;
    }

    /**
     * The meeting session this event belongs to.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }
}
