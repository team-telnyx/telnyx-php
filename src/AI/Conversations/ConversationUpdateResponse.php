<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ConversationUpdateResponseShape = array{data?: Conversation|null}
 */
final class ConversationUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ConversationUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   created_at: \DateTimeInterface,
     *   last_message_at: \DateTimeInterface,
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
     *   created_at: \DateTimeInterface,
     *   last_message_at: \DateTimeInterface,
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
