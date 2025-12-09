<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrder\AdditionalStep;
use Telnyx\PortingOrders\PortingOrder\PhoneNumberType;
use Telnyx\PortingOrders\PortingOrderActivationSettings\ActivationStatus;
use Telnyx\PortingOrders\PortingOrderMessaging\MessagingPortStatus;
use Telnyx\PortingOrders\PortingOrderMisc\RemainingNumbersAction;
use Telnyx\PortingOrders\PortingOrderRequirement\FieldType;
use Telnyx\PortingOrdersExceptionType;
use Telnyx\PortingOrderStatus;
use Telnyx\PortingOrderStatus\Value;

/**
 * @phpstan-type PortingOrderShape = array{
 *   id?: string|null,
 *   activationSettings?: PortingOrderActivationSettings|null,
 *   additionalSteps?: list<value-of<AdditionalStep>>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   customerGroupReference?: string|null,
 *   customerReference?: string|null,
 *   description?: string|null,
 *   documents?: PortingOrderDocuments|null,
 *   endUser?: PortingOrderEndUser|null,
 *   messaging?: PortingOrderMessaging|null,
 *   misc?: PortingOrderMisc|null,
 *   oldServiceProviderOcn?: string|null,
 *   parentSupportKey?: string|null,
 *   phoneNumberConfiguration?: PortingOrderPhoneNumberConfiguration|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 *   portingPhoneNumbersCount?: int|null,
 *   recordType?: string|null,
 *   requirements?: list<PortingOrderRequirement>|null,
 *   requirementsMet?: bool|null,
 *   status?: PortingOrderStatus|null,
 *   supportKey?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   userFeedback?: PortingOrderUserFeedback|null,
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
     * @param PortingOrderActivationSettings|array{
     *   activationStatus?: value-of<ActivationStatus>|null,
     *   fastPortEligible?: bool|null,
     *   focDatetimeActual?: \DateTimeInterface|null,
     *   focDatetimeRequested?: \DateTimeInterface|null,
     * } $activationSettings
     * @param list<AdditionalStep|value-of<AdditionalStep>> $additionalSteps
     * @param PortingOrderDocuments|array{
     *   invoice?: string|null, loa?: string|null
     * } $documents
     * @param PortingOrderEndUser|array{
     *   admin?: PortingOrderEndUserAdmin|null,
     *   location?: PortingOrderEndUserLocation|null,
     * } $endUser
     * @param PortingOrderMessaging|array{
     *   enableMessaging?: bool|null,
     *   messagingCapable?: bool|null,
     *   messagingPortCompleted?: bool|null,
     *   messagingPortStatus?: value-of<MessagingPortStatus>|null,
     * } $messaging
     * @param PortingOrderMisc|array{
     *   newBillingPhoneNumber?: string|null,
     *   remainingNumbersAction?: value-of<RemainingNumbersAction>|null,
     *   type?: value-of<PortingOrderType>|null,
     * }|null $misc
     * @param PortingOrderPhoneNumberConfiguration|array{
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   emergencyAddressID?: string|null,
     *   messagingProfileID?: string|null,
     *   tags?: list<string>|null,
     * } $phoneNumberConfiguration
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param list<PortingOrderRequirement|array{
     *   fieldType?: value-of<FieldType>|null,
     *   fieldValue?: string|null,
     *   recordType?: string|null,
     *   requirementTypeID?: string|null,
     * }> $requirements
     * @param PortingOrderStatus|array{
     *   details?: list<PortingOrdersExceptionType>|null, value?: value-of<Value>|null
     * } $status
     * @param PortingOrderUserFeedback|array{
     *   userComment?: string|null, userRating?: int|null
     * } $userFeedback
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $activationSettings && $obj['activationSettings'] = $activationSettings;
        null !== $additionalSteps && $obj['additionalSteps'] = $additionalSteps;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $customerGroupReference && $obj['customerGroupReference'] = $customerGroupReference;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $description && $obj['description'] = $description;
        null !== $documents && $obj['documents'] = $documents;
        null !== $endUser && $obj['endUser'] = $endUser;
        null !== $messaging && $obj['messaging'] = $messaging;
        null !== $misc && $obj['misc'] = $misc;
        null !== $oldServiceProviderOcn && $obj['oldServiceProviderOcn'] = $oldServiceProviderOcn;
        null !== $parentSupportKey && $obj['parentSupportKey'] = $parentSupportKey;
        null !== $phoneNumberConfiguration && $obj['phoneNumberConfiguration'] = $phoneNumberConfiguration;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $portingPhoneNumbersCount && $obj['portingPhoneNumbersCount'] = $portingPhoneNumbersCount;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $requirements && $obj['requirements'] = $requirements;
        null !== $requirementsMet && $obj['requirementsMet'] = $requirementsMet;
        null !== $status && $obj['status'] = $status;
        null !== $supportKey && $obj['supportKey'] = $supportKey;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $userFeedback && $obj['userFeedback'] = $userFeedback;
        null !== $userID && $obj['userID'] = $userID;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * Uniquely identifies this porting order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param PortingOrderActivationSettings|array{
     *   activationStatus?: value-of<ActivationStatus>|null,
     *   fastPortEligible?: bool|null,
     *   focDatetimeActual?: \DateTimeInterface|null,
     *   focDatetimeRequested?: \DateTimeInterface|null,
     * } $activationSettings
     */
    public function withActivationSettings(
        PortingOrderActivationSettings|array $activationSettings
    ): self {
        $obj = clone $this;
        $obj['activationSettings'] = $activationSettings;

        return $obj;
    }

    /**
     * For specific porting orders, we may require additional steps to be taken before submitting the porting order.
     *
     * @param list<AdditionalStep|value-of<AdditionalStep>> $additionalSteps
     */
    public function withAdditionalSteps(array $additionalSteps): self
    {
        $obj = clone $this;
        $obj['additionalSteps'] = $additionalSteps;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    public function withCustomerGroupReference(
        ?string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj['customerGroupReference'] = $customerGroupReference;

        return $obj;
    }

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * A description of the porting order.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     *
     * @param PortingOrderDocuments|array{
     *   invoice?: string|null, loa?: string|null
     * } $documents
     */
    public function withDocuments(PortingOrderDocuments|array $documents): self
    {
        $obj = clone $this;
        $obj['documents'] = $documents;

        return $obj;
    }

    /**
     * @param PortingOrderEndUser|array{
     *   admin?: PortingOrderEndUserAdmin|null,
     *   location?: PortingOrderEndUserLocation|null,
     * } $endUser
     */
    public function withEndUser(PortingOrderEndUser|array $endUser): self
    {
        $obj = clone $this;
        $obj['endUser'] = $endUser;

        return $obj;
    }

    /**
     * Information about messaging porting process.
     *
     * @param PortingOrderMessaging|array{
     *   enableMessaging?: bool|null,
     *   messagingCapable?: bool|null,
     *   messagingPortCompleted?: bool|null,
     *   messagingPortStatus?: value-of<MessagingPortStatus>|null,
     * } $messaging
     */
    public function withMessaging(PortingOrderMessaging|array $messaging): self
    {
        $obj = clone $this;
        $obj['messaging'] = $messaging;

        return $obj;
    }

    /**
     * @param PortingOrderMisc|array{
     *   newBillingPhoneNumber?: string|null,
     *   remainingNumbersAction?: value-of<RemainingNumbersAction>|null,
     *   type?: value-of<PortingOrderType>|null,
     * }|null $misc
     */
    public function withMisc(PortingOrderMisc|array|null $misc): self
    {
        $obj = clone $this;
        $obj['misc'] = $misc;

        return $obj;
    }

    /**
     * Identifies the old service provider.
     */
    public function withOldServiceProviderOcn(
        string $oldServiceProviderOcn
    ): self {
        $obj = clone $this;
        $obj['oldServiceProviderOcn'] = $oldServiceProviderOcn;

        return $obj;
    }

    /**
     * A key to reference for the porting order group when contacting Telnyx customer support. This information is not available for porting orders in `draft` state.
     */
    public function withParentSupportKey(?string $parentSupportKey): self
    {
        $obj = clone $this;
        $obj['parentSupportKey'] = $parentSupportKey;

        return $obj;
    }

    /**
     * @param PortingOrderPhoneNumberConfiguration|array{
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   emergencyAddressID?: string|null,
     *   messagingProfileID?: string|null,
     *   tags?: list<string>|null,
     * } $phoneNumberConfiguration
     */
    public function withPhoneNumberConfiguration(
        PortingOrderPhoneNumberConfiguration|array $phoneNumberConfiguration
    ): self {
        $obj = clone $this;
        $obj['phoneNumberConfiguration'] = $phoneNumberConfiguration;

        return $obj;
    }

    /**
     * The type of the phone number.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Count of phone numbers associated with this porting order.
     */
    public function withPortingPhoneNumbersCount(
        int $portingPhoneNumbersCount
    ): self {
        $obj = clone $this;
        $obj['portingPhoneNumbersCount'] = $portingPhoneNumbersCount;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * List of documentation requirements for porting numbers. Can be set directly or via the `requirement_group_id` parameter.
     *
     * @param list<PortingOrderRequirement|array{
     *   fieldType?: value-of<FieldType>|null,
     *   fieldValue?: string|null,
     *   recordType?: string|null,
     *   requirementTypeID?: string|null,
     * }> $requirements
     */
    public function withRequirements(array $requirements): self
    {
        $obj = clone $this;
        $obj['requirements'] = $requirements;

        return $obj;
    }

    /**
     * Is true when the required documentation is met.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj['requirementsMet'] = $requirementsMet;

        return $obj;
    }

    /**
     * Porting order status.
     *
     * @param PortingOrderStatus|array{
     *   details?: list<PortingOrdersExceptionType>|null, value?: value-of<Value>|null
     * } $status
     */
    public function withStatus(PortingOrderStatus|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * A key to reference this porting order when contacting Telnyx customer support. This information is not available in draft porting orders.
     */
    public function withSupportKey(?string $supportKey): self
    {
        $obj = clone $this;
        $obj['supportKey'] = $supportKey;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * @param PortingOrderUserFeedback|array{
     *   userComment?: string|null, userRating?: int|null
     * } $userFeedback
     */
    public function withUserFeedback(
        PortingOrderUserFeedback|array $userFeedback
    ): self {
        $obj = clone $this;
        $obj['userFeedback'] = $userFeedback;

        return $obj;
    }

    /**
     * Identifies the user (or organization) who requested the porting order.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
