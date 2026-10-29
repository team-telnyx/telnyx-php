<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * A namespace's summary settings, shared by every profile in it.
 *
 * @phpstan-type SummarySettingsShape = array{instructions?: string|null}
 */
final class SummarySettings implements BaseModel
{
    /** @use SdkModel<SummarySettingsShape> */
    use SdkModel;

    /**
     * Free-form instructions that influence how this namespace's summaries are written, shared by every profile in the namespace. How you use them is up to you -- they steer the outcome, so try a phrasing and see how the summary comes out. Advisory: they steer the summary but never override or deny a profile's own facts, and they do not affect recall. Null or empty means none are set, and summaries use the neutral default. A change reaches each summary the next time it is regenerated.
     */
    #[Optional(nullable: true)]
    public ?string $instructions;

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
        string|Omitted|null $instructions = Omitted::VALUE
    ): self {
        $self = new self;

        Omitted::VALUE !== $instructions && $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Free-form instructions that influence how this namespace's summaries are written, shared by every profile in the namespace. How you use them is up to you -- they steer the outcome, so try a phrasing and see how the summary comes out. Advisory: they steer the summary but never override or deny a profile's own facts, and they do not affect recall. Null or empty means none are set, and summaries use the neutral default. A change reaches each summary the next time it is regenerated.
     */
    public function withInstructions(?string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }
}
