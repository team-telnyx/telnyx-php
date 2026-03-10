<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\InviteTool\InviteConfig;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InviteConfigShape from \Telnyx\AI\Assistants\AssistantTool\InviteTool\InviteConfig
 *
 * @phpstan-type InviteToolShape = array{
 *   inviteConfig: InviteConfig|InviteConfigShape, type: 'invite'
 * }
 */
final class InviteTool implements BaseModel
{
    /** @use SdkModel<InviteToolShape> */
    use SdkModel;

    /** @var 'invite' $type */
    #[Required]
    public string $type = 'invite';

    #[Required('invite_config')]
    public InviteConfig $inviteConfig;

    /**
     * `new InviteTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InviteTool::with(inviteConfig: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InviteTool)->withInviteConfig(...)
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
     * @param InviteConfig|InviteConfigShape $inviteConfig
     */
    public static function with(InviteConfig|array $inviteConfig): self
    {
        $self = new self;

        $self['inviteConfig'] = $inviteConfig;

        return $self;
    }

    /**
     * @param InviteConfig|InviteConfigShape $inviteConfig
     */
    public function withInviteConfig(InviteConfig|array $inviteConfig): self
    {
        $self = clone $this;
        $self['inviteConfig'] = $inviteConfig;

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
