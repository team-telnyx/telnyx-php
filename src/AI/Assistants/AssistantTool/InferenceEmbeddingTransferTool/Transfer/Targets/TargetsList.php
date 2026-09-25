<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\Targets;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TargetsListShape = array{
 *   to: string,
 *   extension?: string|null,
 *   message?: string|null,
 *   name?: string|null,
 *   sipAuthPassword?: string|null,
 *   sipAuthUsername?: string|null,
 * }
 */
final class TargetsList implements BaseModel
{
    /** @use SdkModel<TargetsListShape> */
    use SdkModel;

    /**
     * The destination number or SIP URI of the call.
     */
    #[Required]
    public string $to;

    /**
     * DTMF digits to send automatically after the transfer destination answers. Useful for reaching an extension behind an IVR (e.g. `"200"` to dial extension 200 once the called party picks up). Allowed characters: `0-9`, `A-D`, `w` (0.5s pause), `W` (1s pause), `*`, `#`. Maximum 64 characters. When omitted, no automatic DTMF is sent.
     */
    #[Optional]
    public ?string $extension;

    /**
     * The warm transfer message to deliver to this specific target. When set, it takes precedence over the message the assistant composes from `warm_transfer_instructions`.
     */
    #[Optional]
    public ?string $message;

    /**
     * The name of the target.
     */
    #[Optional]
    public ?string $name;

    /**
     * SIP Authentication password used for SIP challenges. Applies when `to` is a SIP URI.
     */
    #[Optional('sip_auth_password')]
    public ?string $sipAuthPassword;

    /**
     * SIP Authentication username used for SIP challenges. Applies when `to` is a SIP URI.
     */
    #[Optional('sip_auth_username')]
    public ?string $sipAuthUsername;

    /**
     * `new TargetsList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TargetsList::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TargetsList)->withTo(...)
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
     */
    public static function with(
        string $to,
        ?string $extension = null,
        ?string $message = null,
        ?string $name = null,
        ?string $sipAuthPassword = null,
        ?string $sipAuthUsername = null,
    ): self {
        $self = new self;

        $self['to'] = $to;

        null !== $extension && $self['extension'] = $extension;
        null !== $message && $self['message'] = $message;
        null !== $name && $self['name'] = $name;
        null !== $sipAuthPassword && $self['sipAuthPassword'] = $sipAuthPassword;
        null !== $sipAuthUsername && $self['sipAuthUsername'] = $sipAuthUsername;

        return $self;
    }

    /**
     * The destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * DTMF digits to send automatically after the transfer destination answers. Useful for reaching an extension behind an IVR (e.g. `"200"` to dial extension 200 once the called party picks up). Allowed characters: `0-9`, `A-D`, `w` (0.5s pause), `W` (1s pause), `*`, `#`. Maximum 64 characters. When omitted, no automatic DTMF is sent.
     */
    public function withExtension(string $extension): self
    {
        $self = clone $this;
        $self['extension'] = $extension;

        return $self;
    }

    /**
     * The warm transfer message to deliver to this specific target. When set, it takes precedence over the message the assistant composes from `warm_transfer_instructions`.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * The name of the target.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * SIP Authentication password used for SIP challenges. Applies when `to` is a SIP URI.
     */
    public function withSipAuthPassword(string $sipAuthPassword): self
    {
        $self = clone $this;
        $self['sipAuthPassword'] = $sipAuthPassword;

        return $self;
    }

    /**
     * SIP Authentication username used for SIP challenges. Applies when `to` is a SIP URI.
     */
    public function withSipAuthUsername(string $sipAuthUsername): self
    {
        $self = clone $this;
        $self['sipAuthUsername'] = $sipAuthUsername;

        return $self;
    }
}
