<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAIGatherMessageHistoryUpdatedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallAIGatherMessageHistoryUpdatedWebhookEvent\Data\Payload\MessageHistory\Role;

/**
 * @phpstan-type message_history = array{
 *   content?: string|null, role?: value-of<Role>|null
 * }
 */
final class MessageHistory implements BaseModel
{
    /** @use SdkModel<message_history> */
    use SdkModel;

    /**
     * The content of the message.
     */
    #[Api(optional: true)]
    public ?string $content;

    /**
     * The role of the message sender.
     *
     * @var value-of<Role>|null $role
     */
    #[Api(enum: Role::class, optional: true)]
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
        $obj = new self;

        null !== $content && $obj->content = $content;
        null !== $role && $obj->role = $role instanceof Role ? $role->value : $role;

        return $obj;
    }

    /**
     * The content of the message.
     */
    public function withContent(string $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * The role of the message sender.
     *
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $obj = clone $this;
        $obj->role = $role instanceof Role ? $role->value : $role;

        return $obj;
    }
}
