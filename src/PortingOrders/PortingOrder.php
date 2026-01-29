<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrder\AdditionalStep;
use Telnyx\PortingOrders\PortingOrder\PhoneNumberType;
use Telnyx\PortingOrderStatus;

/**
 * @phpstan-import-type PortingOrderActivationSettingsShape from \Telnyx\PortingOrders\PortingOrderActivationSettings
 * @phpstan-import-type PortingOrderDocumentsShape from \Telnyx\PortingOrders\PortingOrderDocuments
 * @phpstan-import-type PortingOrderEndUserShape from \Telnyx\PortingOrders\PortingOrderEndUser
 * @phpstan-import-type PortingOrderMessagingShape from \Telnyx\PortingOrders\PortingOrderMessaging
 * @phpstan-import-type PortingOrderMiscShape from \Telnyx\PortingOrders\PortingOrderMisc
 * @phpstan-import-type PortingOrderPhoneNumberConfigurationShape from \Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration
 * @phpstan-import-type PortingOrderRequirementShape from \Telnyx\PortingOrders\PortingOrderRequirement
 * @phpstan-import-type PortingOrderStatusShape from \Telnyx\PortingOrderStatus
 * @phpstan-import-type PortingOrderUserFeedbackShape from \Telnyx\PortingOrders\PortingOrderUserFeedback
 *
 * @phpstan-type PortingOrderShape = array{
 *   id?: string|null,
 *   activationSettings?: null|PortingOrderActivationSettings|PortingOrderActivationSettingsShape,
 *   additionalSteps?: list<AdditionalStep|value-of<AdditionalStep>>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerGroupReference?: string|null,
 *   customerReference?: string|null,
 *   description?: string|null,
 *   documents?: null|PortingOrderDocuments|PortingOrderDocumentsShape,
 *   endUser?: null|PortingOrderEndUser|PortingOrderEndUserShape,
 *   messaging?: null|PortingOrderMessaging|PortingOrderMessagingShape,
 *   misc?: null|PortingOrderMisc|PortingOrderMiscShape,
 *   oldServiceProviderOcn?: string|null,
 *   parentSupportKey?: string|null,
 *   phoneNumberConfiguration?: null|PortingOrderPhoneNumberConfiguration|PortingOrderPhoneNumberConfigurationShape,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   portingPhoneNumbersCount?: int|null,
 *   recordType?: string|null,
 *   requirements?: list<PortingOrderRequirement|PortingOrderRequirementShape>|null,
 *   requirementsMet?: bool|null,
 *   status?: null|PortingOrderStatus|PortingOrderStatusShape,
 *   supportKey?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   userFeedback?: null|PortingOrderUserFeedback|PortingOrderUserFeedbackShape,
 *   userID?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class PortingOrder implements BaseModel
{
    /** @use SdkModel<PortingOrderShape> */
    use SdkModel;

    /**
     * Uniquely identifies this porting order.
     */
    #[Optional]
    public ?string $id;

    #[Optional('activation_settings')]
    public ?PortingOrderActivationSettings $activationSettings;

    /**
     * For specific porting orders, we may require additional steps to be taken before submitting the porting order.
     *
     * @var list<value-of<AdditionalStep>>|null $additionalSteps
     */
    #[Optional('additional_steps', list: AdditionalStep::class)]
    public ?array $additionalSteps;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    #[Optional('customer_group_reference', nullable: true)]
    public ?string $customerGroupReference;

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    #[Optional('customer_reference', nullable: true)]
    public ?string $customerReference;

    /**
     * A description of the porting order.
     */
    #[Optional]
    public ?string $description;

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     */
    #[Optional]
    public ?PortingOrderDocuments $documents;

    #[Optional('end_user')]
    public ?PortingOrderEndUser $endUser;

    /**
     * Information about messaging porting process.
     */
    #[Optional]
    public ?PortingOrderMessaging $messaging;

    #[Optional(nullable: true)]
    public ?PortingOrderMisc $misc;

    /**
     * Identifies the old service provider.
     */
    #[Optional('old_service_provider_ocn')]
    public ?string $oldServiceProviderOcn;

    /**
     * A key to reference for the porting order group when contacting Telnyx customer support. This information is not available for porting orders in `draft` state.
     */
    #[Optional('parent_support_key', nullable: true)]
    public ?string $parentSupportKey;

    #[Optional('phone_number_configuration')]
    public ?PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration;

    /**
     * The type of the phone number.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    /**
     * Count of phone numbers associated with this porting order.
     */
    #[Optional('porting_phone_numbers_count')]
    public ?int $portingPhoneNumbersCount;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * List of documentation requirements for porting numbers. Can be set directly or via the `requirement_group_id` parameter.
     *
     * @var list<PortingOrderRequirement>|null $requirements
     */
    #[Optional(list: PortingOrderRequirement::class)]
    public ?array $requirements;

    /**
     * Is true when the required documentation is met.
     */
    #[Optional('requirements_met')]
    public ?bool $requirementsMet;

    /**
     * Porting order status.
     */
    #[Optional]
    public ?PortingOrderStatus $status;

    /**
     * A key to reference this porting order when contacting Telnyx customer support. This information is not available in draft porting orders.
     */
    #[Optional('support_key', nullable: true)]
    public ?string $supportKey;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('user_feedback')]
    public ?PortingOrderUserFeedback $userFeedback;

    /**
     * Identifies the user (or organization) who requested the porting order.
     */
    #[Optional('user_id')]
    public ?string $userID;

    #[Optional('webhook_url', nullable: true)]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrderActivationSettings|PortingOrderActivationSettingsShape|null $activationSettings
     * @param list<AdditionalStep|value-of<AdditionalStep>>|null $additionalSteps
     * @param PortingOrderDocuments|PortingOrderDocumentsShape|null $documents
     * @param PortingOrderEndUser|PortingOrderEndUserShape|null $endUser
     * @param PortingOrderMessaging|PortingOrderMessagingShape|null $messaging
     * @param PortingOrderMisc|PortingOrderMiscShape|null $misc
     * @param PortingOrderPhoneNumberConfiguration|PortingOrderPhoneNumberConfigurationShape|null $phoneNumberConfiguration
     * @param PhoneNumberType|value-of<PhoneNumberType>|null $phoneNumberType
     * @param list<PortingOrderRequirement|PortingOrderRequirementShape>|null $requirements
     * @param PortingOrderStatus|PortingOrderStatusShape|null $status
     * @param PortingOrderUserFeedback|PortingOrderUserFeedbackShape|null $userFeedback
     */
    public static function with(
        ?string $id = null,
        PortingOrderActivationSettings|array|null $activationSettings = null,
        ?array $additionalSteps = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        ?string $description = null,
        PortingOrderDocuments|array|null $documents = null,
        PortingOrderEndUser|array|null $endUser = null,
        PortingOrderMessaging|array|null $messaging = null,
        PortingOrderMisc|array|null $misc = null,
        ?string $oldServiceProviderOcn = null,
        ?string $parentSupportKey = null,
        PortingOrderPhoneNumberConfiguration|array|null $phoneNumberConfiguration = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?int $portingPhoneNumbersCount = null,
        ?string $recordType = null,
        ?array $requirements = null,
        ?bool $requirementsMet = null,
        PortingOrderStatus|array|null $status = null,
        ?string $supportKey = null,
        ?\DateTimeInterface $updatedAt = null,
        PortingOrderUserFeedback|array|null $userFeedback = null,
        ?string $userID = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $activationSettings && $self['activationSettings'] = $activationSettings;
        null !== $additionalSteps && $self['additionalSteps'] = $additionalSteps;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customerGroupReference && $self['customerGroupReference'] = $customerGroupReference;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $description && $self['description'] = $description;
        null !== $documents && $self['documents'] = $documents;
        null !== $endUser && $self['endUser'] = $endUser;
        null !== $messaging && $self['messaging'] = $messaging;
        null !== $misc && $self['misc'] = $misc;
        null !== $oldServiceProviderOcn && $self['oldServiceProviderOcn'] = $oldServiceProviderOcn;
        null !== $parentSupportKey && $self['parentSupportKey'] = $parentSupportKey;
        null !== $phoneNumberConfiguration && $self['phoneNumberConfiguration'] = $phoneNumberConfiguration;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $portingPhoneNumbersCount && $self['portingPhoneNumbersCount'] = $portingPhoneNumbersCount;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $requirements && $self['requirements'] = $requirements;
        null !== $requirementsMet && $self['requirementsMet'] = $requirementsMet;
        null !== $status && $self['status'] = $status;
        null !== $supportKey && $self['supportKey'] = $supportKey;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userFeedback && $self['userFeedback'] = $userFeedback;
        null !== $userID && $self['userID'] = $userID;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Uniquely identifies this porting order.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param PortingOrderActivationSettings|PortingOrderActivationSettingsShape $activationSettings
     */
    public function withActivationSettings(
        PortingOrderActivationSettings|array $activationSettings
    ): self {
        $self = clone $this;
        $self['activationSettings'] = $activationSettings;

        return $self;
    }

    /**
     * For specific porting orders, we may require additional steps to be taken before submitting the porting order.
     *
     * @param list<AdditionalStep|value-of<AdditionalStep>> $additionalSteps
     */
    public function withAdditionalSteps(array $additionalSteps): self
    {
        $self = clone $this;
        $self['additionalSteps'] = $additionalSteps;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    public function withCustomerGroupReference(
        ?string $customerGroupReference
    ): self {
        $self = clone $this;
        $self['customerGroupReference'] = $customerGroupReference;

        return $self;
    }

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * A description of the porting order.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     *
     * @param PortingOrderDocuments|PortingOrderDocumentsShape $documents
     */
    public function withDocuments(PortingOrderDocuments|array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * @param PortingOrderEndUser|PortingOrderEndUserShape $endUser
     */
    public function withEndUser(PortingOrderEndUser|array $endUser): self
    {
        $self = clone $this;
        $self['endUser'] = $endUser;

        return $self;
    }

    /**
     * Information about messaging porting process.
     *
     * @param PortingOrderMessaging|PortingOrderMessagingShape $messaging
     */
    public function withMessaging(PortingOrderMessaging|array $messaging): self
    {
        $self = clone $this;
        $self['messaging'] = $messaging;

        return $self;
    }

    /**
     * @param PortingOrderMisc|PortingOrderMiscShape|null $misc
     */
    public function withMisc(PortingOrderMisc|array|null $misc): self
    {
        $self = clone $this;
        $self['misc'] = $misc;

        return $self;
    }

    /**
     * Identifies the old service provider.
     */
    public function withOldServiceProviderOcn(
        string $oldServiceProviderOcn
    ): self {
        $self = clone $this;
        $self['oldServiceProviderOcn'] = $oldServiceProviderOcn;

        return $self;
    }

    /**
     * A key to reference for the porting order group when contacting Telnyx customer support. This information is not available for porting orders in `draft` state.
     */
    public function withParentSupportKey(?string $parentSupportKey): self
    {
        $self = clone $this;
        $self['parentSupportKey'] = $parentSupportKey;

        return $self;
    }

    /**
     * @param PortingOrderPhoneNumberConfiguration|PortingOrderPhoneNumberConfigurationShape $phoneNumberConfiguration
     */
    public function withPhoneNumberConfiguration(
        PortingOrderPhoneNumberConfiguration|array $phoneNumberConfiguration
    ): self {
        $self = clone $this;
        $self['phoneNumberConfiguration'] = $phoneNumberConfiguration;

        return $self;
    }

    /**
     * The type of the phone number.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Count of phone numbers associated with this porting order.
     */
    public function withPortingPhoneNumbersCount(
        int $portingPhoneNumbersCount
    ): self {
        $self = clone $this;
        $self['portingPhoneNumbersCount'] = $portingPhoneNumbersCount;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * List of documentation requirements for porting numbers. Can be set directly or via the `requirement_group_id` parameter.
     *
     * @param list<PortingOrderRequirement|PortingOrderRequirementShape> $requirements
     */
    public function withRequirements(array $requirements): self
    {
        $self = clone $this;
        $self['requirements'] = $requirements;

        return $self;
    }

    /**
     * Is true when the required documentation is met.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $self = clone $this;
        $self['requirementsMet'] = $requirementsMet;

        return $self;
    }

    /**
     * Porting order status.
     *
     * @param PortingOrderStatus|PortingOrderStatusShape $status
     */
    public function withStatus(PortingOrderStatus|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * A key to reference this porting order when contacting Telnyx customer support. This information is not available in draft porting orders.
     */
    public function withSupportKey(?string $supportKey): self
    {
        $self = clone $this;
        $self['supportKey'] = $supportKey;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param PortingOrderUserFeedback|PortingOrderUserFeedbackShape $userFeedback
     */
    public function withUserFeedback(
        PortingOrderUserFeedback|array $userFeedback
    ): self {
        $self = clone $this;
        $self['userFeedback'] = $userFeedback;

        return $self;
    }

    /**
     * Identifies the user (or organization) who requested the porting order.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
