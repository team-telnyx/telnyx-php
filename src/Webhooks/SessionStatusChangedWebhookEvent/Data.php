<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\SessionStatusChangedWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Status transition details.
 *
 * @phpstan-type DataShape = array{
 *   recording: bool, sessionID: string, status: string, statusDetail: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Whether the session is recording at this lifecycle edge.
     */
    #[Required]
    public bool $recording;

    /**
     * The meeting session this event belongs to.
     */
    #[Required('session_id')]
    public string $sessionID;

    /**
     * The new session status.
     */
    #[Required]
    public string $status;

    /**
     * Additional detail about the status (for example `timeout_exceeded_everyone_left` or `cancelled`), or null.
     */
    #[Required('status_detail')]
    public ?string $statusDetail;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(recording: ..., sessionID: ..., status: ..., statusDetail: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withRecording(...)
     *   ->withSessionID(...)
     *   ->withStatus(...)
     *   ->withStatusDetail(...)
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
    public static function with(
        bool $recording,
        string $sessionID,
        string $status,
        ?string $statusDetail
    ): self {
        $self = new self;

        $self['recording'] = $recording;
        $self['sessionID'] = $sessionID;
        $self['status'] = $status;
        $self['statusDetail'] = $statusDetail;

        return $self;
    }

    /**
     * Whether the session is recording at this lifecycle edge.
     */
    public function withRecording(bool $recording): self
    {
        $self = clone $this;
        $self['recording'] = $recording;

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

    /**
     * The new session status.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Additional detail about the status (for example `timeout_exceeded_everyone_left` or `cancelled`), or null.
     */
    public function withStatusDetail(?string $statusDetail): self
    {
        $self = clone $this;
        $self['statusDetail'] = $statusDetail;

        return $self;
    }
}
