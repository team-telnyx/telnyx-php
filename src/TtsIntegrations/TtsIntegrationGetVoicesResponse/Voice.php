<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations\TtsIntegrationGetVoicesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VoiceShape = array{
 *   voiceID: string,
 *   gender?: string|null,
 *   language?: string|null,
 *   name?: string|null,
 *   provider?: string|null,
 * }
 */
final class Voice implements BaseModel
{
    /** @use SdkModel<VoiceShape> */
    use SdkModel;

    /**
     * Unique in the list; no dots. A caller selects the voice as `<engine name>.<voice_id>`.
     */
    #[Required('voice_id')]
    public string $voiceID;

    /**
     * A display string, for example `male`, `female` or `neutral`.
     */
    #[Optional]
    public ?string $gender;

    /**
     * A BCP-47 tag, at most 35 characters.
     */
    #[Optional]
    public ?string $language;

    /**
     * A display name.
     */
    #[Optional]
    public ?string $name;

    /**
     * A display string.
     */
    #[Optional]
    public ?string $provider;

    /**
     * `new Voice()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Voice::with(voiceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Voice)->withVoiceID(...)
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
        string $voiceID,
        ?string $gender = null,
        ?string $language = null,
        ?string $name = null,
        ?string $provider = null,
    ): self {
        $self = new self;

        $self['voiceID'] = $voiceID;

        null !== $gender && $self['gender'] = $gender;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $provider && $self['provider'] = $provider;

        return $self;
    }

    /**
     * Unique in the list; no dots. A caller selects the voice as `<engine name>.<voice_id>`.
     */
    public function withVoiceID(string $voiceID): self
    {
        $self = clone $this;
        $self['voiceID'] = $voiceID;

        return $self;
    }

    /**
     * A display string, for example `male`, `female` or `neutral`.
     */
    public function withGender(string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * A BCP-47 tag, at most 35 characters.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * A display name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A display string.
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}
