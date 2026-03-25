<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency;

/**
 * Update how often reputation data is automatically refreshed.
 *
 * **Note:** The enterprise must have `approved` reputation settings. Updating frequency on `pending` or `rejected` settings will return an error.
 *
 * **Available Frequencies:**
 * - `business_daily` — Monday–Friday
 * - `daily` — Every day including weekends
 * - `weekly` — Once per week
 * - `biweekly` — Once every two weeks
 * - `monthly` — Once per month
 * - `never` — Manual refresh only (no automatic checks)
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
     * New frequency for refreshing reputation data.
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
     * New frequency for refreshing reputation data.
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
