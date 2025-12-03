<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get scheduled events for an assistant with pagination and filtering.
 *
 * @see Telnyx\Services\AI\Assistants\ScheduledEventsService::list()
 *
 * @phpstan-type ScheduledEventListParamsShape = array{
 *   conversation_channel?: ConversationChannelType|value-of<ConversationChannelType>,
 *   from_date?: \DateTimeInterface,
 *   page_number_?: int,
 *   page_size_?: int,
 *   to_date?: \DateTimeInterface,
 * }
 */
final class ScheduledEventListParams implements BaseModel
{
    /** @use SdkModel<ScheduledEventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<ConversationChannelType>|null $conversation_channel */
    #[Api(enum: ConversationChannelType::class, optional: true)]
    public ?string $conversation_channel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $from_date;

    #[Api(optional: true)]
    public ?int $page_number_;

    #[Api(optional: true)]
    public ?int $page_size_;

    #[Api(optional: true)]
    public ?\DateTimeInterface $to_date;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversation_channel
     */
    public static function with(
        ConversationChannelType|string|null $conversation_channel = null,
        ?\DateTimeInterface $from_date = null,
        ?int $page_number_ = null,
        ?int $page_size_ = null,
        ?\DateTimeInterface $to_date = null,
    ): self {
        $obj = new self;

        null !== $conversation_channel && $obj['conversation_channel'] = $conversation_channel;
        null !== $from_date && $obj->from_date = $from_date;
        null !== $page_number_ && $obj->page_number_ = $page_number_;
        null !== $page_size_ && $obj->page_size_ = $page_size_;
        null !== $to_date && $obj->to_date = $to_date;

        return $obj;
    }

    /**
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel
     */
    public function withConversationChannel(
        ConversationChannelType|string $conversationChannel
    ): self {
        $obj = clone $this;
        $obj['conversation_channel'] = $conversationChannel;

        return $obj;
    }

    public function withFromDate(\DateTimeInterface $fromDate): self
    {
        $obj = clone $this;
        $obj->from_date = $fromDate;

        return $obj;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $obj = clone $this;
        $obj->page_number_ = $pageNumber;

        return $obj;
    }

    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj->page_size_ = $pageSize;

        return $obj;
    }

    public function withToDate(\DateTimeInterface $toDate): self
    {
        $obj = clone $this;
        $obj->to_date = $toDate;

        return $obj;
    }
}
