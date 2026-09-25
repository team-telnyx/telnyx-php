<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Settings\SettingPatchAllParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * A partial update to a namespace's summary settings.
 *
 * Only the fields present in the request are changed; the rest are left as
 * they are. Sending `instructions: null` (or empty) clears the instructions.
 *
 * @phpstan-type SummaryShape = array{instructions?: string|null}
 */
final class Summary implements BaseModel
{
    /** @use SdkModel<SummaryShape> */
    use SdkModel;

    /**
     * Replace the namespace's summary instructions. Null or empty clears them and returns to the neutral default. Omit the field to leave the current instructions unchanged.
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
     * Replace the namespace's summary instructions. Null or empty clears them and returns to the neutral default. Omit the field to leave the current instructions unchanged.
     */
    public function withInstructions(?string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }
}
