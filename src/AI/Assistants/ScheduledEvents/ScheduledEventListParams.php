<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ScheduledEventListParams); // set properties as needed
 * $client->ai.assistants.scheduledEvents->list(...$params->toArray());
 * ```
 * Get scheduled events for an assistant with pagination and filtering.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants.scheduledEvents->list(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants\ScheduledEvents->list
 *
 * @phpstan-type scheduled_event_list_params = array{
 *   conversationChannel?: ConversationChannelType|value-of<ConversationChannelType>,
 *   fromDate?: \DateTimeInterface,
 *   page?: Page,
 *   toDate?: \DateTimeInterface,
 * }
 */
final class ScheduledEventListParams implements BaseModel
{
    /** @use SdkModel<scheduled_event_list_params> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<ConversationChannelType>|null $conversationChannel */
    #[Api(enum: ConversationChannelType::class, optional: true)]
    public ?string $conversationChannel;

    #[Api(optional: true)]
    public ?\DateTimeInterface $fromDate;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    #[Api(optional: true)]
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
        ?Page $page = null,
        ?\DateTimeInterface $toDate = null,
    ): self {
        $obj = new self;

        null !== $conversationChannel && $obj->conversationChannel = $conversationChannel instanceof ConversationChannelType ? $conversationChannel->value : $conversationChannel;
        null !== $fromDate && $obj->fromDate = $fromDate;
        null !== $page && $obj->page = $page;
        null !== $toDate && $obj->toDate = $toDate;

        return $obj;
    }

    /**
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel
     */
    public function withConversationChannel(
        ConversationChannelType|string $conversationChannel
    ): self {
        $obj = clone $this;
        $obj->conversationChannel = $conversationChannel instanceof ConversationChannelType ? $conversationChannel->value : $conversationChannel;

        return $obj;
    }

    public function withFromDate(\DateTimeInterface $fromDate): self
    {
        $obj = clone $this;
        $obj->fromDate = $fromDate;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    public function withToDate(\DateTimeInterface $toDate): self
    {
        $obj = clone $this;
        $obj->toDate = $toDate;

        return $obj;
    }
}
