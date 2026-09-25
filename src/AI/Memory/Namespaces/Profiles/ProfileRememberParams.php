<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * For a fact the agent has already distilled: `text` is stored as given, with nothing extracted from it. Send a transcript to `ingest` instead. Remembering the same text again writes the same memory rather than a second copy of it, so a retry is safe. The write runs asynchronously -- poll the returned operation.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\ProfilesService::remember()
 *
 * @phpstan-type ProfileRememberParamsShape = array{
 *   namespace: string, text: string
 * }
 */
final class ProfileRememberParams implements BaseModel
{
    /** @use SdkModel<ProfileRememberParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $namespace;

    #[Required]
    public string $text;

    /**
     * `new ProfileRememberParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfileRememberParams::with(namespace: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfileRememberParams)->withNamespace(...)->withText(...)
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
    public static function with(string $namespace, string $text): self
    {
        $self = new self;

        $self['namespace'] = $namespace;
        $self['text'] = $text;

        return $self;
    }

    public function withNamespace(string $namespace): self
    {
        $self = clone $this;
        $self['namespace'] = $namespace;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
