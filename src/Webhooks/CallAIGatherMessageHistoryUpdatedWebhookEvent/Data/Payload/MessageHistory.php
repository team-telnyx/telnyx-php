<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherMessageHistoryUpdatedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallAIGatherMessageHistoryUpdatedWebhookEvent\Data\Payload\MessageHistory\Role;

/**
 * @phpstan-type MessageHistoryShape = array{
 *   content?: string|null, role?: null|Role|value-of<Role>
 * }
 */
final class MessageHistory implements BaseModel
{
    /** @use SdkModel<MessageHistoryShape> */
    use SdkModel;

    /**
     * The content of the message.
     */
    #[Optional]
    public ?string $content;

    /**
     * The role of the message sender.
     *
     * @var value-of<Role>|null $role
     */
    #[Optional(enum: Role::class)]
    public ?string $role;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Role|value-of<Role> $role
     */
    public static function with(
        ?string $content = null,
        Role|string|null $role = null
    ): self {
        $self = new self;

        null !== $content && $self['content'] = $content;
        null !== $role && $self['role'] = $role;

        return $self;
    }

    /**
     * The content of the message.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The role of the message sender.
     *
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }
}
