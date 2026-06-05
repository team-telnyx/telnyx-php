<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\ReputationEnableParams\CheckFrequency;

/**
 * Activate Phone Number Reputation for the given enterprise. Requires an uploaded Letter of Authorization document (the `loa_document_id` references the Telnyx Documents API) and a refresh-frequency selection. After activation, individual phone numbers can be registered via `POST .../reputation/numbers`.
 *
 * **Prerequisite**: the calling user must have agreed to the Phone Number Reputation Terms of Service (`POST /terms_of_service/number_reputation/agree`).
 *
 * Failure modes:
 * - `403` — Phone Number Reputation Terms of Service not accepted.
 * - `404` — enterprise does not exist or does not belong to your account.
 * - `400` — reputation already enabled for this enterprise.
 * - `422` — `loa_document_id` missing or `check_frequency` invalid.
 *
 * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
 *
 * @see Telnyx\Services\Enterprises\ReputationService::enable()
 *
 * @phpstan-type ReputationEnableParamsShape = array{
 *   loaDocumentID: string,
 *   checkFrequency?: null|CheckFrequency|value-of<CheckFrequency>,
 * }
 */
final class ReputationEnableParams implements BaseModel
{
    /** @use SdkModel<ReputationEnableParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Id of the signed Letter of Authorization document, returned by the Telnyx Documents API after upload (upload via `POST /v2/documents`; see https://developers.telnyx.com/api/documents).
     */
    #[Required('loa_document_id')]
    public string $loaDocumentID;

    /**
     * How often Telnyx refreshes the stored reputation data for this enterprise's registered numbers.
     *
     * @var value-of<CheckFrequency>|null $checkFrequency
     */
    #[Optional('check_frequency', enum: CheckFrequency::class)]
    public ?string $checkFrequency;

    /**
     * `new ReputationEnableParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReputationEnableParams::with(loaDocumentID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReputationEnableParams)->withLoaDocumentID(...)
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
     * Id of the signed Letter of Authorization document, returned by the Telnyx Documents API after upload (upload via `POST /v2/documents`; see https://developers.telnyx.com/api/documents).
     */
    public function withLoaDocumentID(string $loaDocumentID): self
    {
        $self = clone $this;
        $self['loaDocumentID'] = $loaDocumentID;

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
