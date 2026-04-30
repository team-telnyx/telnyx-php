<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InviteShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite
 *
 * @phpstan-type InviteToolShape = array{
 *   invite: Invite|InviteShape, type: 'invite'
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
    public static function with(Invite|array $invite): self
    {
        $self = new self;

        $self['invite'] = $invite;

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
}
