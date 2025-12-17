<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool\CheckAvailability;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CheckAvailabilityShape from \Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool\CheckAvailability
 *
 * @phpstan-type CheckAvailabilityToolShape = array{
 *   checkAvailability: CheckAvailability|CheckAvailabilityShape,
 *   type: 'check_availability',
 * }
 */
final class CheckAvailabilityTool implements BaseModel
{
    /** @use SdkModel<CheckAvailabilityToolShape> */
    use SdkModel;

    /** @var 'check_availability' $type */
    #[Required]
    public string $type = 'check_availability';

    #[Required('check_availability')]
    public CheckAvailability $checkAvailability;

    /**
     * `new CheckAvailabilityTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckAvailabilityTool::with(checkAvailability: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckAvailabilityTool)->withCheckAvailability(...)
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
     * @param CheckAvailability|CheckAvailabilityShape $checkAvailability
     */
    public static function with(
        CheckAvailability|array $checkAvailability
    ): self {
        $self = new self;

        $self['checkAvailability'] = $checkAvailability;

        return $self;
    }

    /**
     * @param CheckAvailability|CheckAvailabilityShape $checkAvailability
     */
    public function withCheckAvailability(
        CheckAvailability|array $checkAvailability
    ): self {
        $self = clone $this;
        $self['checkAvailability'] = $checkAvailability;

        return $self;
    }
}
