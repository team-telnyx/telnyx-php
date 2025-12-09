<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationListResponseShape = array{data: list<Conversation>}
 */
final class ConversationListResponse implements BaseModel
{
    /** @use SdkModel<ConversationListResponseShape> */
    use SdkModel;

    /** @var list<Conversation> $data */
    #[Required(list: Conversation::class)]
    public array $data;

    /**
     * `new ConversationListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationListResponse)->withData(...)
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
     * @param list<Conversation|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   lastMessageAt: \DateTimeInterface,
     *   metadata: array<string,string>,
     *   name?: string|null,
     * }> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Conversation|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   lastMessageAt: \DateTimeInterface,
     *   metadata: array<string,string>,
     *   name?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
