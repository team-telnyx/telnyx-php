<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroup\RegulatoryRequirement;
use Telnyx\RequirementGroups\RequirementGroup\Status;

/**
 * @phpstan-type RequirementGroupShape = array{
 *   id?: string|null,
 *   action?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerReference?: string|null,
 *   phoneNumberType?: string|null,
 *   recordType?: string|null,
 *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
 *   status?: value-of<Status>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class RequirementGroup implements BaseModel
{
    /** @use SdkModel<RequirementGroupShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $action;

    #[Optional('country_code')]
    public ?string $countryCode;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('customer_reference')]
    public ?string $customerReference;

    #[Optional('phone_number_type')]
    public ?string $phoneNumberType;

    #[Optional('record_type')]
    public ?string $recordType;

    /** @var list<RegulatoryRequirement>|null $regulatoryRequirements */
    #[Optional('regulatory_requirements', list: RegulatoryRequirement::class)]
    public ?array $regulatoryRequirements;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
     *   createdAt?: \DateTimeInterface|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   fieldType?: string|null,
     *   fieldValue?: string|null,
     *   requirementID?: string|null,
     *   status?: value-of<RegulatoryRequirement\Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $regulatoryRequirements
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $action = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerReference = null,
        ?string $phoneNumberType = null,
        ?string $recordType = null,
        ?array $regulatoryRequirements = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $action && $obj['action'] = $action;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $regulatoryRequirements && $obj['regulatoryRequirements'] = $regulatoryRequirements;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withAction(string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

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
     *   createdAt?: \DateTimeInterface|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   fieldType?: string|null,
     *   fieldValue?: string|null,
     *   requirementID?: string|null,
     *   status?: value-of<RegulatoryRequirement\Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatoryRequirements'] = $regulatoryRequirements;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
