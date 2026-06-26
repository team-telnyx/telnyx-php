<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency;

/**
 * Update how often Telnyx refreshes the reputation data for this enterprise's registered numbers. The new frequency takes effect on the next scheduled refresh.
 *
 * The enterprise's reputation must be in `approved` status. A request made while the status is `pending` is rejected with `400 Bad Request`.
 *
 * @see Telnyx\Services\Enterprises\ReputationService::updateFrequency()
 *
 * @phpstan-type ReputationUpdateFrequencyParamsShape = array{
 *   checkFrequency: CheckFrequency|value-of<CheckFrequency>
 * }
 */
final class ReputationUpdateFrequencyParams implements BaseModel
{
    /** @use SdkModel<ReputationUpdateFrequencyParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * How often Telnyx refreshes the stored reputation data for this enterprise's registered numbers.
     *
     * @var value-of<CheckFrequency> $checkFrequency
     */
    #[Required('check_frequency', enum: CheckFrequency::class)]
    public string $checkFrequency;

    /**
     * `new ReputationUpdateFrequencyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReputationUpdateFrequencyParams::with(checkFrequency: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReputationUpdateFrequencyParams)->withCheckFrequency(...)
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
     * @param CheckFrequency|value-of<CheckFrequency> $checkFrequency
     */
    public static function with(CheckFrequency|string $checkFrequency): self
    {
        $self = new self;

        $self['checkFrequency'] = $checkFrequency;

        return $self;
    }

    /**
     * How often Telnyx refreshes the stored reputation data for this enterprise's registered numbers.
     *
     * @param CheckFrequency|value-of<CheckFrequency> $checkFrequency
     */
    public function withCheckFrequency(
        CheckFrequency|string $checkFrequency
    ): self {
        $self = clone $this;
        $self['checkFrequency'] = $checkFrequency;

        return $self;
    }
}
