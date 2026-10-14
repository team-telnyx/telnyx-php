<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Answer an ownership question about a phone number hosted with another provider.
 *
 * Send `still_own: true` to confirm you still own a number whose `ownership_status` is `pending_confirmation` or `flagged`; its status returns to `verified` and, after a carrier change, the new carrier becomes the one on record.
 *
 * Send `still_own: false` to report that you no longer own the number. It is removed from Number Reputation immediately, whatever its current status, and the response shows it with `ownership_status: removed`.
 *
 * @see Telnyx\Services\Enterprises\Reputation\NumbersService::ownershipConfirm()
 *
 * @phpstan-type NumberOwnershipConfirmParamsShape = array{
 *   enterpriseID: string, stillOwn: bool, evidenceDocumentID?: string|null
 * }
 */
final class NumberOwnershipConfirmParams implements BaseModel
{
    /** @use SdkModel<NumberOwnershipConfirmParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $enterpriseID;

    /**
     * `true` confirms you still own the number. `false` reports that you no longer own it and removes it from Number Reputation.
     */
    #[Required('still_own')]
    public bool $stillOwn;

    /**
     * Optional id of an uploaded document supporting the confirmation.
     */
    #[Optional('evidence_document_id')]
    public ?string $evidenceDocumentID;

    /**
     * `new NumberOwnershipConfirmParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberOwnershipConfirmParams::with(enterpriseID: ..., stillOwn: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberOwnershipConfirmParams)->withEnterpriseID(...)->withStillOwn(...)
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
    public static function with(
        string $enterpriseID,
        bool $stillOwn,
        ?string $evidenceDocumentID = null
    ): self {
        $self = new self;

        $self['enterpriseID'] = $enterpriseID;
        $self['stillOwn'] = $stillOwn;

        null !== $evidenceDocumentID && $self['evidenceDocumentID'] = $evidenceDocumentID;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * `true` confirms you still own the number. `false` reports that you no longer own it and removes it from Number Reputation.
     */
    public function withStillOwn(bool $stillOwn): self
    {
        $self = clone $this;
        $self['stillOwn'] = $stillOwn;

        return $self;
    }

    /**
     * Optional id of an uploaded document supporting the confirmation.
     */
    public function withEvidenceDocumentID(string $evidenceDocumentID): self
    {
        $self = clone $this;
        $self['evidenceDocumentID'] = $evidenceDocumentID;

        return $self;
    }
}
