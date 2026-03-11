<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\BusinessAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BusinessAccountListResponseShape = array{
 *   id?: string|null,
 *   accountReviewStatus?: string|null,
 *   businessVerificationStatus?: string|null,
 *   country?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   phoneNumbersCount?: int|null,
 *   recordType?: string|null,
 *   status?: string|null,
 *   wabaID?: string|null,
 * }
 */
final class BusinessAccountListResponse implements BaseModel
{
    /** @use SdkModel<BusinessAccountListResponseShape> */
    use SdkModel;

    /**
     * Internal ID of Whatsapp business account.
     */
    #[Optional]
    public ?string $id;

    /**
     * Account review status of Whatsapp business account.
     */
    #[Optional('account_review_status')]
    public ?string $accountReviewStatus;

    /**
     * Business verification status of Whatsapp business account.
     */
    #[Optional('business_verification_status')]
    public ?string $businessVerificationStatus;

    /**
     * Country associated with Whatsapp business account.
     */
    #[Optional]
    public ?string $country;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Name of Whatsapp business account.
     */
    #[Optional]
    public ?string $name;

    /**
     * Count of phone numbers associated with Whatsapp business account.
     */
    #[Optional('phone_numbers_count')]
    public ?int $phoneNumbersCount;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Status of Whatsapp business account.
     */
    #[Optional]
    public ?string $status;

    /**
     * WABA ID of Whatsapp business account.
     */
    #[Optional('waba_id')]
    public ?string $wabaID;

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
        ?string $id = null,
        ?string $accountReviewStatus = null,
        ?string $businessVerificationStatus = null,
        ?string $country = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?int $phoneNumbersCount = null,
        ?string $recordType = null,
        ?string $status = null,
        ?string $wabaID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $accountReviewStatus && $self['accountReviewStatus'] = $accountReviewStatus;
        null !== $businessVerificationStatus && $self['businessVerificationStatus'] = $businessVerificationStatus;
        null !== $country && $self['country'] = $country;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $phoneNumbersCount && $self['phoneNumbersCount'] = $phoneNumbersCount;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $wabaID && $self['wabaID'] = $wabaID;

        return $self;
    }

    /**
     * Internal ID of Whatsapp business account.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Account review status of Whatsapp business account.
     */
    public function withAccountReviewStatus(string $accountReviewStatus): self
    {
        $self = clone $this;
        $self['accountReviewStatus'] = $accountReviewStatus;

        return $self;
    }

    /**
     * Business verification status of Whatsapp business account.
     */
    public function withBusinessVerificationStatus(
        string $businessVerificationStatus
    ): self {
        $self = clone $this;
        $self['businessVerificationStatus'] = $businessVerificationStatus;

        return $self;
    }

    /**
     * Country associated with Whatsapp business account.
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Name of Whatsapp business account.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Count of phone numbers associated with Whatsapp business account.
     */
    public function withPhoneNumbersCount(int $phoneNumbersCount): self
    {
        $self = clone $this;
        $self['phoneNumbersCount'] = $phoneNumbersCount;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Status of Whatsapp business account.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * WABA ID of Whatsapp business account.
     */
    public function withWabaID(string $wabaID): self
    {
        $self = clone $this;
        $self['wabaID'] = $wabaID;

        return $self;
    }
}
