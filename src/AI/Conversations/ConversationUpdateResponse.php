<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationUpdateResponseShape = array{data?: Conversation|null}
 */
final class ConversationUpdateResponse implements BaseModel
{
    /** @use SdkModel<ConversationUpdateResponseShape> */
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
