<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\SessionStatusChangedWebhookEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\SessionStatusChangedWebhookEvent\Data\PreviousStatus;

/**
 * Status transition details.
 *
 * @phpstan-type DataShape = array{
 *   recording: bool,
 *   sessionID: string,
 *   status: string,
 *   statusDetail: string|null,
 *   previousStatus?: null|PreviousStatus|value-of<PreviousStatus>,
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
     * Additional detail about the status (for example `cancelled`), or null.
     */
    #[Required('status_detail')]
    public ?string $statusDetail;

    /**
     * Previous lifecycle status, when supplied.
     *
     * @var value-of<PreviousStatus>|null $previousStatus
     */
    #[Optional('previous_status', enum: PreviousStatus::class)]
    public ?string $previousStatus;

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
     *
     * @param PreviousStatus|value-of<PreviousStatus>|null $previousStatus
     */
    public static function with(
        bool $recording,
        string $sessionID,
        string $status,
        ?string $statusDetail,
        PreviousStatus|string|null $previousStatus = null,
    ): self {
        $self = new self;

        $self['recording'] = $recording;
        $self['sessionID'] = $sessionID;
        $self['status'] = $status;
        $self['statusDetail'] = $statusDetail;

        null !== $previousStatus && $self['previousStatus'] = $previousStatus;

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
     * Additional detail about the status (for example `cancelled`), or null.
     */
    public function withStatusDetail(?string $statusDetail): self
    {
        $self = clone $this;
        $self['statusDetail'] = $statusDetail;

        return $self;
    }

    /**
     * Previous lifecycle status, when supplied.
     *
     * @param PreviousStatus|value-of<PreviousStatus> $previousStatus
     */
    public function withPreviousStatus(
        PreviousStatus|string $previousStatus
    ): self {
        $self = clone $this;
        $self['previousStatus'] = $previousStatus;

        return $self;
    }
}
