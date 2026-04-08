<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\ReputationCreateParams\CheckFrequency;

/**
 * Enable Number Reputation service for an enterprise.
 *
 * **Requirements:**
 * - Signed LOA (Letter of Authorization) document ID
 * - Reputation check frequency (defaults to `business_daily`)
 * - Number Reputation Terms of Service must be accepted
 *
 * **Flow:**
 * 1. Registers the enterprise for reputation monitoring
 * 2. Creates reputation settings with `pending` status
 * 3. Awaits admin approval before monitoring begins
 *
 * **Resubmission After Rejection:**
 * If a previously rejected record exists, this endpoint will delete it and create a new `pending` record.
 *
 * **Available Frequencies:**
 * - `business_daily` — Monday–Friday
 * - `daily` — Every day
 * - `weekly` — Once per week
 * - `biweekly` — Once every two weeks
 * - `monthly` — Once per month
 * - `never` — Manual refresh only
 *
 * @see Telnyx\Services\Enterprises\ReputationService::create()
 *
 * @phpstan-type ReputationCreateParamsShape = array{
 *   loaDocumentID: string,
 *   checkFrequency?: null|CheckFrequency|value-of<CheckFrequency>,
 * }
 */
final class ReputationCreateParams implements BaseModel
{
    /** @use SdkModel<ReputationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the signed Letter of Authorization (LOA) document uploaded to the document service.
     */
    #[Required('loa_document_id')]
    public string $loaDocumentID;

    /**
     * Frequency for automatically refreshing reputation data.
     *
     * @var value-of<CheckFrequency>|null $checkFrequency
     */
    #[Optional('check_frequency', enum: CheckFrequency::class)]
    public ?string $checkFrequency;

    /**
     * `new ReputationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReputationCreateParams::with(loaDocumentID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReputationCreateParams)->withLoaDocumentID(...)
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
     * @param CheckFrequency|value-of<CheckFrequency>|null $checkFrequency
     */
    public static function with(
        string $loaDocumentID,
        CheckFrequency|string|null $checkFrequency = null
    ): self {
        $self = new self;

        $self['loaDocumentID'] = $loaDocumentID;

        null !== $checkFrequency && $self['checkFrequency'] = $checkFrequency;

        return $self;
    }

    /**
     * ID of the signed Letter of Authorization (LOA) document uploaded to the document service.
     */
    public function withLoaDocumentID(string $loaDocumentID): self
    {
        $self = clone $this;
        $self['loaDocumentID'] = $loaDocumentID;

        return $self;
    }

    /**
     * Frequency for automatically refreshing reputation data.
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
