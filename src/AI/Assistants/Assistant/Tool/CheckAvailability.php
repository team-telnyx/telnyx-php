<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CheckAvailabilityShape = array{
 *   check_availability: \Telnyx\AI\Assistants\Assistant\Tool\CheckAvailability\CheckAvailability,
 *   type: 'check_availability',
 * }
 */
final class CheckAvailability implements BaseModel
{
    /** @use SdkModel<CheckAvailabilityShape> */
    use SdkModel;

    /** @var 'check_availability' $type */
    #[Required]
    public string $type = 'check_availability';

    #[Required]
    public CheckAvailability\CheckAvailability $check_availability;

    /**
     * `new CheckAvailability()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckAvailability::with(check_availability: ...)
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
     *   api_key_ref: string, event_type_id: int
     * } $check_availability
     */
    public static function with(
        CheckAvailability\CheckAvailability|array $check_availability,
    ): self {
        $obj = new self;

        $obj['check_availability'] = $check_availability;

        return $obj;
    }

    /**
     * @param CheckAvailability\CheckAvailability|array{
     *   api_key_ref: string, event_type_id: int
     * } $checkAvailability
     */
    public function withCheckAvailability(
        CheckAvailability\CheckAvailability|array $checkAvailability,
    ): self {
        $obj = clone $this;
        $obj['check_availability'] = $checkAvailability;

        return $obj;
    }
}
