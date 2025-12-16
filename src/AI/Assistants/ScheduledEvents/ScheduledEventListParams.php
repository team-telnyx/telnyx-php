<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get scheduled events for an assistant with pagination and filtering.
 *
 * @see Telnyx\Services\AI\Assistants\ScheduledEventsService::list()
 *
 * @phpstan-type ScheduledEventListParamsShape = array{
 *   conversationChannel?: null|ConversationChannelType|value-of<ConversationChannelType>,
 *   fromDate?: \DateTimeInterface|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   toDate?: \DateTimeInterface|null,
 * }
 */
final class ScheduledEventListParams implements BaseModel
{
    /** @use SdkModel<ScheduledEventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<ConversationChannelType>|null $conversationChannel */
    #[Optional(enum: ConversationChannelType::class)]
    public ?string $conversationChannel;

    #[Optional]
    public ?\DateTimeInterface $fromDate;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    #[Optional]
    public ?\DateTimeInterface $toDate;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel
     */
    public static function with(
        ConversationChannelType|string|null $conversationChannel = null,
        ?\DateTimeInterface $fromDate = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?\DateTimeInterface $toDate = null,
    ): self {
        $self = new self;

        null !== $conversationChannel && $self['conversationChannel'] = $conversationChannel;
        null !== $fromDate && $self['fromDate'] = $fromDate;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $toDate && $self['toDate'] = $toDate;

        return $self;
    }

    /**
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel
     */
    public function withConversationChannel(
        ConversationChannelType|string $conversationChannel
    ): self {
        $self = clone $this;
        $self['conversationChannel'] = $conversationChannel;

        return $self;
    }

    public function withFromDate(\DateTimeInterface $fromDate): self
    {
        $self = clone $this;
        $self['fromDate'] = $fromDate;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withToDate(\DateTimeInterface $toDate): self
    {
        $self = clone $this;
        $self['toDate'] = $toDate;

        return $self;
    }
}
