<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Moves an existing scheduled email to a new future send time. Only the delivery time (`scheduled_at`) changes; the message ID, content, recipients, tags, and metadata remain unchanged. Returns `409 Conflict` if the message is no longer scheduled or its scheduled-send worker has already started processing it. This route emits no dedicated `rescheduled` event.
 *
 * @see Telnyx\Services\EmailMessagesService::updateSchedule()
 *
 * @phpstan-type EmailMessageUpdateScheduleParamsShape = array{
 *   scheduledAt: \DateTimeInterface
 * }
 */
final class EmailMessageUpdateScheduleParams implements BaseModel
{
    /** @use SdkModel<EmailMessageUpdateScheduleParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * New ISO 8601 delivery time. Must be strictly in the future.
     */
    #[Required('scheduled_at')]
    public \DateTimeInterface $scheduledAt;

    /**
     * `new EmailMessageUpdateScheduleParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailMessageUpdateScheduleParams::with(scheduledAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailMessageUpdateScheduleParams)->withScheduledAt(...)
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
    public static function with(\DateTimeInterface $scheduledAt): self
    {
        $self = new self;

        $self['scheduledAt'] = $scheduledAt;

        return $self;
    }

    /**
     * New ISO 8601 delivery time. Must be strictly in the future.
     */
    public function withScheduledAt(\DateTimeInterface $scheduledAt): self
    {
        $self = clone $this;
        $self['scheduledAt'] = $scheduledAt;

        return $self;
    }
}
