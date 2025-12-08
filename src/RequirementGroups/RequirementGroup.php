<?php

declare(strict_types=1);

namespace Telnyx\RequirementGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RequirementGroups\RequirementGroup\RegulatoryRequirement;
use Telnyx\RequirementGroups\RequirementGroup\Status;

/**
 * @phpstan-type RequirementGroupShape = array{
 *   id?: string|null,
 *   action?: string|null,
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   customer_reference?: string|null,
 *   phone_number_type?: string|null,
 *   record_type?: string|null,
 *   regulatory_requirements?: list<RegulatoryRequirement>|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class RequirementGroup implements BaseModel
{
    /** @use SdkModel<RequirementGroupShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $action;

    #[Api(optional: true)]
    public ?string $country_code;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?string $customer_reference;

    #[Api(optional: true)]
    public ?string $phone_number_type;

    #[Api(optional: true)]
    public ?string $record_type;

    /** @var list<RegulatoryRequirement>|null $regulatory_requirements */
    #[Api(list: RegulatoryRequirement::class, optional: true)]
    public ?array $regulatory_requirements;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

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
     *   created_at?: \DateTimeInterface|null,
     *   expires_at?: \DateTimeInterface|null,
     *   field_type?: string|null,
     *   field_value?: string|null,
     *   requirement_id?: string|null,
     *   status?: value-of<RegulatoryRequirement\Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $regulatory_requirements
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $action = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        ?string $customer_reference = null,
        ?string $phone_number_type = null,
        ?string $record_type = null,
        ?array $regulatory_requirements = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $action && $obj['action'] = $action;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $regulatory_requirements && $obj['regulatory_requirements'] = $regulatory_requirements;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    public function withPhoneNumberType(string $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * @param list<RegulatoryRequirement|array{
     *   created_at?: \DateTimeInterface|null,
     *   expires_at?: \DateTimeInterface|null,
     *   field_type?: string|null,
     *   field_value?: string|null,
     *   requirement_id?: string|null,
     *   status?: value-of<RegulatoryRequirement\Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $regulatoryRequirements
     */
    public function withRegulatoryRequirements(
        array $regulatoryRequirements
    ): self {
        $obj = clone $this;
        $obj['regulatory_requirements'] = $regulatoryRequirements;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
