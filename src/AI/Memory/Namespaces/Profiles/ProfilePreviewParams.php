<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Try a candidate note on one profile and see how that profile's summary would read under it, without saving the note and without touching the stored summary. Composes the same source query the apply path (`PATCH /ai/memory/namespaces/{namespace}/settings`) would use, so a preview cannot drift from what saving the note would produce. Reads the candidate alone -- the namespace's current instructions and the profile's stored summary are neither read nor replaced. Bounded at 120 seconds: the summary is generated on the spot rather than read from a stored one. Nothing about the request is stored.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\ProfilesService::preview()
 *
 * @phpstan-type ProfilePreviewParamsShape = array{
 *   namespace: string, instructions?: string|null
 * }
 */
final class ProfilePreviewParams implements BaseModel
{
    /** @use SdkModel<ProfilePreviewParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The namespace. `default` exists for every organization.
     */
    #[Required]
    public string $namespace;

    /**
     * The candidate note to try. `null`, empty, or whitespace-only previews the neutral default -- the summary a profile returns to when instructions are cleared. Capped at 2000 characters, the same cap `PATCH /settings` applies on save; a longer note is refused with `422` before anything is generated.
     */
    #[Optional(nullable: true)]
    public ?string $instructions;

    /**
     * `new ProfilePreviewParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ProfilePreviewParams::with(namespace: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ProfilePreviewParams)->withNamespace(...)
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
        string $namespace,
        string|Omitted|null $instructions = Omitted::VALUE
    ): self {
        $self = new self;

        $self['namespace'] = $namespace;

        Omitted::VALUE !== $instructions && $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * The namespace. `default` exists for every organization.
     */
    public function withNamespace(string $namespace): self
    {
        $self = clone $this;
        $self['namespace'] = $namespace;

        return $self;
    }

    /**
     * The candidate note to try. `null`, empty, or whitespace-only previews the neutral default -- the summary a profile returns to when instructions are cleared. Capped at 2000 characters, the same cap `PATCH /settings` applies on save; a longer note is refused with `422` before anything is generated.
     */
    public function withInstructions(?string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }
}
