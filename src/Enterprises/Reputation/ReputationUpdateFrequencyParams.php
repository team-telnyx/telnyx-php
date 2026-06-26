<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update how often Telnyx refreshes the reputation data for this enterprise's registered numbers. The new frequency takes effect on the next scheduled refresh.
 *
 * The enterprise's reputation must be in `approved` status. A request made while the status is `pending` is rejected with `400 Bad Request`.
 *
 * @see Telnyx\Services\Enterprises\ReputationService::updateFrequency()
 *
 * @phpstan-type ReputationUpdateFrequencyParamsShape = array{
 *   checkFrequency: ReputationCheckFrequency|value-of<ReputationCheckFrequency>
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
     * @var value-of<ReputationCheckFrequency> $checkFrequency
     */
    #[Required('check_frequency', enum: ReputationCheckFrequency::class)]
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
     * @param ReputationCheckFrequency|value-of<ReputationCheckFrequency> $checkFrequency
     */
    public static function with(
        ReputationCheckFrequency|string $checkFrequency
    ): self {
        $self = new self;

        $self['checkFrequency'] = $checkFrequency;

        return $self;
    }

    /**
     * How often Telnyx refreshes the stored reputation data for this enterprise's registered numbers.
     *
     * @param ReputationCheckFrequency|value-of<ReputationCheckFrequency> $checkFrequency
     */
    public function withCheckFrequency(
        ReputationCheckFrequency|string $checkFrequency
    ): self {
        $self = clone $this;
        $self['checkFrequency'] = $checkFrequency;

        return $self;
    }
}
