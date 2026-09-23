<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InviteShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite
 *
 * @phpstan-type InviteToolShape = array{
 *   invite: Invite|InviteShape, type: 'invite', shared?: bool|null
 * }
 */
final class InviteTool implements BaseModel
{
    /** @use SdkModel<InviteToolShape> */
    use SdkModel;

    /** @var 'invite' $type */
    #[Required]
    public string $type = 'invite';

    #[Required]
    public Invite $invite;

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

    /**
     * `new InviteTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InviteTool::with(invite: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InviteTool)->withInvite(...)
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
     * @param Invite|InviteShape $invite
     */
    public static function with(Invite|array $invite, ?bool $shared = null): self
    {
        $self = new self;

        $self['invite'] = $invite;

        null !== $shared && $self['shared'] = $shared;

        return $self;
    }

    /**
     * @param Invite|InviteShape $invite
     */
    public function withInvite(Invite|array $invite): self
    {
        $self = clone $this;
        $self['invite'] = $invite;

        return $self;
    }

    /**
     * @param 'invite' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    public function withShared(bool $shared): self
    {
        $self = clone $this;
        $self['shared'] = $shared;

        return $self;
    }
}
