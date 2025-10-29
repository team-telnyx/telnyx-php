<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrder\AdditionalStep;
use Telnyx\PortingOrders\PortingOrder\PhoneNumberType;
use Telnyx\PortingOrderStatus;

/**
 * @phpstan-type PortingOrderShape = array{
 *   id?: string,
 *   activationSettings?: PortingOrderActivationSettings,
 *   additionalSteps?: list<value-of<AdditionalStep>>,
 *   createdAt?: \DateTimeInterface,
 *   customerGroupReference?: string,
 *   customerReference?: string,
 *   description?: string,
 *   documents?: PortingOrderDocuments,
 *   endUser?: PortingOrderEndUser,
 *   messaging?: PortingOrderMessaging,
 *   misc?: PortingOrderMisc,
 *   oldServiceProviderOcn?: string,
 *   parentSupportKey?: string,
 *   phoneNumberConfiguration?: PortingOrderPhoneNumberConfiguration,
 *   phoneNumberType?: value-of<PhoneNumberType>,
 *   portingPhoneNumbersCount?: int,
 *   recordType?: string,
 *   requirements?: list<PortingOrderRequirement>,
 *   requirementsMet?: bool,
 *   status?: PortingOrderStatus,
 *   supportKey?: string,
 *   updatedAt?: \DateTimeInterface,
 *   userFeedback?: PortingOrderUserFeedback,
 *   userID?: string,
 *   webhookURL?: string,
 * }
 */
final class PortingOrder implements BaseModel
{
    /** @use SdkModel<PortingOrderShape> */
    use SdkModel;

    /**
     * Uniquely identifies this porting order.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api('activation_settings', optional: true)]
    public ?PortingOrderActivationSettings $activationSettings;

    /**
     * For specific porting orders, we may require additional steps to be taken before submitting the porting order.
     *
     * @var list<value-of<AdditionalStep>>|null $additionalSteps
     */
    #[Api('additional_steps', list: AdditionalStep::class, optional: true)]
    public ?array $additionalSteps;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    #[Api('customer_group_reference', optional: true)]
    public ?string $customerGroupReference;

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * A description of the porting order.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     */
    #[Api(optional: true)]
    public ?PortingOrderDocuments $documents;

    #[Api('end_user', optional: true)]
    public ?PortingOrderEndUser $endUser;

    /**
     * Information about messaging porting process.
     */
    #[Api(optional: true)]
    public ?PortingOrderMessaging $messaging;

    #[Api(optional: true)]
    public ?PortingOrderMisc $misc;

    /**
     * Identifies the old service provider.
     */
    #[Api('old_service_provider_ocn', optional: true)]
    public ?string $oldServiceProviderOcn;

    /**
     * A key to reference for the porting order group when contacting Telnyx customer support. This information is not available for porting orders in `draft` state.
     */
    #[Api('parent_support_key', optional: true)]
    public ?string $parentSupportKey;

    #[Api('phone_number_configuration', optional: true)]
    public ?PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration;

    /**
     * The type of the phone number.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * Count of phone numbers associated with this porting order.
     */
    #[Api('porting_phone_numbers_count', optional: true)]
    public ?int $portingPhoneNumbersCount;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * List of documentation requirements for porting numbers. Can be set directly or via the `requirement_group_id` parameter.
     *
     * @var list<PortingOrderRequirement>|null $requirements
     */
    #[Api(list: PortingOrderRequirement::class, optional: true)]
    public ?array $requirements;

    /**
     * Is true when the required documentation is met.
     */
    #[Api('requirements_met', optional: true)]
    public ?bool $requirementsMet;

    /**
     * Porting order status.
     */
    #[Api(optional: true)]
    public ?PortingOrderStatus $status;

    /**
     * A key to reference this porting order when contacting Telnyx customer support. This information is not available in draft porting orders.
     */
    #[Api('support_key', optional: true)]
    public ?string $supportKey;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api('user_feedback', optional: true)]
    public ?PortingOrderUserFeedback $userFeedback;

    /**
     * Identifies the user (or organization) who requested the porting order.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

    #[Api('webhook_url', optional: true)]
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
     * @param list<AdditionalStep|value-of<AdditionalStep>> $additionalSteps
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param list<PortingOrderRequirement> $requirements
     */
    public static function with(
        ?string $id = null,
        ?PortingOrderActivationSettings $activationSettings = null,
        ?array $additionalSteps = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        ?string $description = null,
        ?PortingOrderDocuments $documents = null,
        ?PortingOrderEndUser $endUser = null,
        ?PortingOrderMessaging $messaging = null,
        ?PortingOrderMisc $misc = null,
        ?string $oldServiceProviderOcn = null,
        ?string $parentSupportKey = null,
        ?PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?int $portingPhoneNumbersCount = null,
        ?string $recordType = null,
        ?array $requirements = null,
        ?bool $requirementsMet = null,
        ?PortingOrderStatus $status = null,
        ?string $supportKey = null,
        ?\DateTimeInterface $updatedAt = null,
        ?PortingOrderUserFeedback $userFeedback = null,
        ?string $userID = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $activationSettings && $obj->activationSettings = $activationSettings;
        null !== $additionalSteps && $obj['additionalSteps'] = $additionalSteps;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerGroupReference && $obj->customerGroupReference = $customerGroupReference;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $description && $obj->description = $description;
        null !== $documents && $obj->documents = $documents;
        null !== $endUser && $obj->endUser = $endUser;
        null !== $messaging && $obj->messaging = $messaging;
        null !== $misc && $obj->misc = $misc;
        null !== $oldServiceProviderOcn && $obj->oldServiceProviderOcn = $oldServiceProviderOcn;
        null !== $parentSupportKey && $obj->parentSupportKey = $parentSupportKey;
        null !== $phoneNumberConfiguration && $obj->phoneNumberConfiguration = $phoneNumberConfiguration;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $portingPhoneNumbersCount && $obj->portingPhoneNumbersCount = $portingPhoneNumbersCount;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $requirements && $obj->requirements = $requirements;
        null !== $requirementsMet && $obj->requirementsMet = $requirementsMet;
        null !== $status && $obj->status = $status;
        null !== $supportKey && $obj->supportKey = $supportKey;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $userFeedback && $obj->userFeedback = $userFeedback;
        null !== $userID && $obj->userID = $userID;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Uniquely identifies this porting order.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withActivationSettings(
        PortingOrderActivationSettings $activationSettings
    ): self {
        $obj = clone $this;
        $obj->activationSettings = $activationSettings;

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
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj->customerGroupReference = $customerGroupReference;

        return $obj;
    }

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * A description of the porting order.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     */
    public function withDocuments(PortingOrderDocuments $documents): self
    {
        $obj = clone $this;
        $obj->documents = $documents;

        return $obj;
    }

    public function withEndUser(PortingOrderEndUser $endUser): self
    {
        $obj = clone $this;
        $obj->endUser = $endUser;

        return $obj;
    }

    /**
     * Information about messaging porting process.
     */
    public function withMessaging(PortingOrderMessaging $messaging): self
    {
        $obj = clone $this;
        $obj->messaging = $messaging;

        return $obj;
    }

    public function withMisc(PortingOrderMisc $misc): self
    {
        $obj = clone $this;
        $obj->misc = $misc;

        return $obj;
    }

    /**
     * Identifies the old service provider.
     */
    public function withOldServiceProviderOcn(
        string $oldServiceProviderOcn
    ): self {
        $obj = clone $this;
        $obj->oldServiceProviderOcn = $oldServiceProviderOcn;

        return $obj;
    }

    /**
     * A key to reference for the porting order group when contacting Telnyx customer support. This information is not available for porting orders in `draft` state.
     */
    public function withParentSupportKey(string $parentSupportKey): self
    {
        $obj = clone $this;
        $obj->parentSupportKey = $parentSupportKey;

        return $obj;
    }

    public function withPhoneNumberConfiguration(
        PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration
    ): self {
        $obj = clone $this;
        $obj->phoneNumberConfiguration = $phoneNumberConfiguration;

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
        $obj->portingPhoneNumbersCount = $portingPhoneNumbersCount;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * List of documentation requirements for porting numbers. Can be set directly or via the `requirement_group_id` parameter.
     *
     * @param list<PortingOrderRequirement> $requirements
     */
    public function withRequirements(array $requirements): self
    {
        $obj = clone $this;
        $obj->requirements = $requirements;

        return $obj;
    }

    /**
     * Is true when the required documentation is met.
     */
    public function withRequirementsMet(bool $requirementsMet): self
    {
        $obj = clone $this;
        $obj->requirementsMet = $requirementsMet;

        return $obj;
    }

    /**
     * Porting order status.
     */
    public function withStatus(PortingOrderStatus $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * A key to reference this porting order when contacting Telnyx customer support. This information is not available in draft porting orders.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj->supportKey = $supportKey;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUserFeedback(
        PortingOrderUserFeedback $userFeedback
    ): self {
        $obj = clone $this;
        $obj->userFeedback = $userFeedback;

        return $obj;
    }

    /**
     * Identifies the user (or organization) who requested the porting order.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
