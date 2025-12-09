<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   bundleID?: string|null,
 *   countryCode?: string|null,
 *   deadline?: \DateTimeInterface|null,
 *   isBlockNumber?: bool|null,
 *   locality?: string|null,
 *   orderRequestID?: string|null,
 *   phoneNumber?: string|null,
 *   phoneNumberType?: string|null,
 *   recordType?: string|null,
 *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
 *   requirementsMet?: bool|null,
 *   requirementsStatus?: string|null,
 *   status?: string|null,
 *   subNumberOrderID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('bundle_id', nullable: true)]
    public ?string $bundleID;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional]
    public ?\DateTimeInterface $deadline;

    #[Optional('is_block_number')]
    public ?bool $isBlockNumber;

    #[Optional]
    public ?string $locality;

    #[Optional('order_request_id')]
    public ?string $orderRequestID;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional('phone_number_type')]
    public ?string $phoneNumberType;

    #[Optional('record_type')]
    public ?string $recordType;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Optional('regulatory_requirements', list: RegulatoryRequirement::class)]
    public ?array $regulatoryRequirements;

    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    #[Optional('requirements_status')]
    public ?string $requirementsStatus;

    #[Optional]
    public ?string $status;

    #[Optional('sub_number_order_id')]
    public ?string $subNumberOrderID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RegulatoryRequirement|array{
     *   fieldType?: string|null,
     *   fieldValue?: string|null,
     *   requirementID?: string|null,
     *   status?: string|null,
     * }> $regulatoryRequirements
     */
    public static function with(
        ?string $id = null,
        ?string $bundleID = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $deadline = null,
        ?bool $isBlockNumber = null,
        ?string $locality = null,
        ?string $orderRequestID = null,
        ?string $phoneNumber = null,
        ?string $phoneNumberType = null,
        ?string $recordType = null,
        ?array $regulatoryRequirements = null,
        ?bool $requirementsMet = null,
        ?string $requirementsStatus = null,
        ?string $status = null,
        ?string $subNumberOrderID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $bundleID && $self['bundleID'] = $bundleID;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $deadline && $self['deadline'] = $deadline;
        null !== $isBlockNumber && $self['isBlockNumber'] = $isBlockNumber;
        null !== $locality && $self['locality'] = $locality;
        null !== $orderRequestID && $self['orderRequestID'] = $orderRequestID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regulatoryRequirements && $self['regulatoryRequirements'] = $regulatoryRequirements;
        null !== $requirementsMet && $self['requirementsMet'] = $requirementsMet;
        null !== $requirementsStatus && $self['requirementsStatus'] = $requirementsStatus;
        null !== $status && $self['status'] = $status;
        null !== $subNumberOrderID && $self['subNumberOrderID'] = $subNumberOrderID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withBundleID(?string $bundleID): self
    {
        $self = clone $this;
        $self['bundleID'] = $bundleID;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withDeadline(\DateTimeInterface $deadline): self
    {
        $self = clone $this;
        $self['deadline'] = $deadline;

        return $self;
    }

    public function withIsBlockNumber(bool $isBlockNumber): self
    {
        $self = clone $this;
        $self['isBlockNumber'] = $isBlockNumber;

        return $self;
    }

    public function withLocality(string $locality): self
    {
        $self = clone $this;
        $self['locality'] = $locality;

        return $self;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $self = clone $this;
        $self['orderRequestID'] = $orderRequestID;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   fieldType?: string|null,
     *   fieldValue?: string|null,
     *   requirementID?: string|null,
     *   status?: string|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $self = clone $this;
        $self['regulatoryRequirements'] = $regulatoryRequirements;

        return $self;
    }

    public function withRequirementsMet(bool $requirementsMet): self
    {
        $self = clone $this;
        $self['requirementsMet'] = $requirementsMet;

        return $self;
    }

    public function withRequirementsStatus(string $requirementsStatus): self
    {
        $self = clone $this;
        $self['requirementsStatus'] = $requirementsStatus;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSubNumberOrderID(string $subNumberOrderID): self
    {
        $self = clone $this;
        $self['subNumberOrderID'] = $subNumberOrderID;

        return $self;
    }
}
