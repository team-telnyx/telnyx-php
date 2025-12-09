<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListParams\Page;
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
 *   conversationChannel?: ConversationChannelType|value-of<ConversationChannelType>,
 *   fromDate?: \DateTimeInterface,
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   toDate?: \DateTimeInterface,
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

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

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
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        ConversationChannelType|string|null $conversationChannel = null,
        ?\DateTimeInterface $fromDate = null,
        Page|array|null $page = null,
        ?\DateTimeInterface $toDate = null,
    ): self {
        $obj = new self;

        null !== $conversationChannel && $obj['conversationChannel'] = $conversationChannel;
        null !== $fromDate && $obj['fromDate'] = $fromDate;
        null !== $page && $obj['page'] = $page;
        null !== $toDate && $obj['toDate'] = $toDate;

        return $obj;
    }

    /**
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel
     */
    public function withConversationChannel(
        ConversationChannelType|string $conversationChannel
    ): self {
        $obj = clone $this;
        $obj['conversationChannel'] = $conversationChannel;

        return $obj;
    }

    public function withFromDate(\DateTimeInterface $fromDate): self
    {
        $obj = clone $this;
        $obj['fromDate'] = $fromDate;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    public function withToDate(\DateTimeInterface $toDate): self
    {
        $obj = clone $this;
        $obj['toDate'] = $toDate;

        return $obj;
    }
}
