<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get detailed reputation data for a specific phone number associated with an enterprise.
 *
 * **Query Parameters:**
 * - `fresh` (default: `false`): When `true`, fetches fresh reputation data (incurs API cost). When `false`, returns cached data. If no cached data exists, fresh data is automatically fetched.
 *
 * **Returns:**
 * - `spam_risk`: Overall spam risk level (`low`, `medium`, `high`)
 * - `spam_category`: Spam category classification
 * - `maturity_score`: Maturity metric (0–100)
 * - `connection_score`: Connection quality metric (0–100)
 * - `engagement_score`: Engagement metric (0–100)
 * - `sentiment_score`: Sentiment metric (0–100)
 * - `last_refreshed_at`: Timestamp of last data refresh
 *
 * @see Telnyx\Services\Enterprises\Reputation\NumbersService::retrieve()
 *
 * @phpstan-type NumberRetrieveParamsShape = array{
 *   enterpriseID: string, fresh?: bool|null
 * }
 */
final class NumberRetrieveParams implements BaseModel
{
    /** @use SdkModel<NumberRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $enterpriseID;

    /**
     * When true, fetches fresh reputation data (incurs API cost). When false, returns cached data.
     */
    #[Optional]
    public ?bool $fresh;

    /**
     * `new NumberRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberRetrieveParams::with(enterpriseID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberRetrieveParams)->withEnterpriseID(...)
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
    public static function with(string $enterpriseID, ?bool $fresh = null): self
    {
        $self = new self;

        $self['enterpriseID'] = $enterpriseID;

        null !== $fresh && $self['fresh'] = $fresh;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * When true, fetches fresh reputation data (incurs API cost). When false, returns cached data.
     */
    public function withFresh(bool $fresh): self
    {
        $self = clone $this;
        $self['fresh'] = $fresh;

        return $self;
    }
}
