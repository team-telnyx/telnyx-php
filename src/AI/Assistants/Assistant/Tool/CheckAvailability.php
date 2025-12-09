<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CheckAvailabilityShape = array{
 *   checkAvailability: \Telnyx\AI\Assistants\Assistant\Tool\CheckAvailability\CheckAvailability,
 *   type?: 'check_availability',
 * }
 */
final class CheckAvailability implements BaseModel
{
    /** @use SdkModel<CheckAvailabilityShape> */
    use SdkModel;

    /** @var 'check_availability' $type */
    #[Required]
    public string $type = 'check_availability';

    #[Required('check_availability')]
    public CheckAvailability\CheckAvailability $checkAvailability;

    /**
     * `new CheckAvailability()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckAvailability::with(checkAvailability: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckAvailability)->withCheckAvailability(...)
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
     * @param CheckAvailability\CheckAvailability|array{
     *   apiKeyRef: string, eventTypeID: int
     * } $checkAvailability
     */
    public static function with(
        CheckAvailability\CheckAvailability|array $checkAvailability,
    ): self {
        $obj = new self;

        $obj['checkAvailability'] = $checkAvailability;

        return $obj;
    }

    /**
     * @param CheckAvailability\CheckAvailability|array{
     *   apiKeyRef: string, eventTypeID: int
     * } $checkAvailability
     */
    public function withCheckAvailability(
        CheckAvailability\CheckAvailability|array $checkAvailability,
    ): self {
        $obj = clone $this;
        $obj['checkAvailability'] = $checkAvailability;

        return $obj;
    }
}
