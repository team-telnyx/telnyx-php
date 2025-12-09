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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $bundleID && $obj['bundleID'] = $bundleID;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $deadline && $obj['deadline'] = $deadline;
        null !== $isBlockNumber && $obj['isBlockNumber'] = $isBlockNumber;
        null !== $locality && $obj['locality'] = $locality;
        null !== $orderRequestID && $obj['orderRequestID'] = $orderRequestID;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $regulatoryRequirements && $obj['regulatoryRequirements'] = $regulatoryRequirements;
        null !== $requirementsMet && $obj['requirementsMet'] = $requirementsMet;
        null !== $requirementsStatus && $obj['requirementsStatus'] = $requirementsStatus;
        null !== $status && $obj['status'] = $status;
        null !== $subNumberOrderID && $obj['subNumberOrderID'] = $subNumberOrderID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withBundleID(?string $bundleID): self
    {
        $obj = clone $this;
        $obj['bundleID'] = $bundleID;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    public function withDeadline(\DateTimeInterface $deadline): self
    {
        $obj = clone $this;
        $obj['deadline'] = $deadline;

        return $obj;
    }

    public function withIsBlockNumber(bool $isBlockNumber): self
    {
        $obj = clone $this;
        $obj['isBlockNumber'] = $isBlockNumber;

        return $obj;
    }

    public function withLocality(string $locality): self
    {
        $obj = clone $this;
        $obj['locality'] = $locality;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj['orderRequestID'] = $orderRequestID;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
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
        $obj = clone $this;
        $obj['regulatoryRequirements'] = $regulatoryRequirements;

        return $obj;
    }

    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirementsMet'] = $requirementsMet;

        return $obj;
    }

    public function withRequirementsStatus(string $requirementsStatus): self
    {
        $obj = clone $this;
        $obj['requirementsStatus'] = $requirementsStatus;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withSubNumberOrderID(string $subNumberOrderID): self
    {
        $obj = clone $this;
        $obj['subNumberOrderID'] = $subNumberOrderID;

        return $obj;
    }
}
