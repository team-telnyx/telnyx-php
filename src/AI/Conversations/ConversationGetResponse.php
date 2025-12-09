<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationGetResponseShape = array{data?: Conversation|null}
 */
final class ConversationGetResponse implements BaseModel
{
    /** @use SdkModel<ConversationGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Conversation $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Conversation|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   lastMessageAt: \DateTimeInterface,
     *   metadata: array<string,string>,
     *   name?: string|null,
     * } $data
     */
    public static function with(Conversation|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Conversation|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   lastMessageAt: \DateTimeInterface,
     *   metadata: array<string,string>,
     *   name?: string|null,
     * } $data
     */
    public function withData(Conversation|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
