<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
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
 *   activation_settings?: PortingOrderActivationSettings|null,
 *   additional_steps?: list<value-of<AdditionalStep>>|null,
 *   created_at?: \DateTimeInterface|null,
 *   customer_group_reference?: string|null,
 *   customer_reference?: string|null,
 *   description?: string|null,
 *   documents?: PortingOrderDocuments|null,
 *   end_user?: PortingOrderEndUser|null,
 *   messaging?: PortingOrderMessaging|null,
 *   misc?: PortingOrderMisc|null,
 *   old_service_provider_ocn?: string|null,
 *   parent_support_key?: string|null,
 *   phone_number_configuration?: PortingOrderPhoneNumberConfiguration|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   porting_phone_numbers_count?: int|null,
 *   record_type?: string|null,
 *   requirements?: list<PortingOrderRequirement>|null,
 *   requirements_met?: bool|null,
 *   status?: PortingOrderStatus|null,
 *   support_key?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   user_feedback?: PortingOrderUserFeedback|null,
 *   user_id?: string|null,
 *   webhook_url?: string|null,
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

    #[Api(optional: true)]
    public ?PortingOrderActivationSettings $activation_settings;

    /**
     * For specific porting orders, we may require additional steps to be taken before submitting the porting order.
     *
     * @var list<value-of<AdditionalStep>>|null $additional_steps
     */
    #[Api(list: AdditionalStep::class, optional: true)]
    public ?array $additional_steps;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $customer_group_reference;

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $customer_reference;

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

    #[Api(optional: true)]
    public ?PortingOrderEndUser $end_user;

    /**
     * Information about messaging porting process.
     */
    #[Api(optional: true)]
    public ?PortingOrderMessaging $messaging;

    #[Api(nullable: true, optional: true)]
    public ?PortingOrderMisc $misc;

    /**
     * Identifies the old service provider.
     */
    #[Api(optional: true)]
    public ?string $old_service_provider_ocn;

    /**
     * A key to reference for the porting order group when contacting Telnyx customer support. This information is not available for porting orders in `draft` state.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $parent_support_key;

    #[Api(optional: true)]
    public ?PortingOrderPhoneNumberConfiguration $phone_number_configuration;

    /**
     * The type of the phone number.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * Count of phone numbers associated with this porting order.
     */
    #[Api(optional: true)]
    public ?int $porting_phone_numbers_count;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
    #[Api(optional: true)]
    public ?bool $requirements_met;

    /**
     * Porting order status.
     */
    #[Api(optional: true)]
    public ?PortingOrderStatus $status;

    /**
     * A key to reference this porting order when contacting Telnyx customer support. This information is not available in draft porting orders.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $support_key;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    #[Api(optional: true)]
    public ?PortingOrderUserFeedback $user_feedback;

    /**
     * Identifies the user (or organization) who requested the porting order.
     */
    #[Api(optional: true)]
    public ?string $user_id;

    #[Api(nullable: true, optional: true)]
    public ?string $webhook_url;

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
     *   activation_status?: value-of<ActivationStatus>|null,
     *   fast_port_eligible?: bool|null,
     *   foc_datetime_actual?: \DateTimeInterface|null,
     *   foc_datetime_requested?: \DateTimeInterface|null,
     * } $activation_settings
     * @param list<AdditionalStep|value-of<AdditionalStep>> $additional_steps
     * @param PortingOrderDocuments|array{
     *   invoice?: string|null, loa?: string|null
     * } $documents
     * @param PortingOrderEndUser|array{
     *   admin?: PortingOrderEndUserAdmin|null,
     *   location?: PortingOrderEndUserLocation|null,
     * } $end_user
     * @param PortingOrderMessaging|array{
     *   enable_messaging?: bool|null,
     *   messaging_capable?: bool|null,
     *   messaging_port_completed?: bool|null,
     *   messaging_port_status?: value-of<MessagingPortStatus>|null,
     * } $messaging
     * @param PortingOrderMisc|array{
     *   new_billing_phone_number?: string|null,
     *   remaining_numbers_action?: value-of<RemainingNumbersAction>|null,
     *   type?: value-of<PortingOrderType>|null,
     * }|null $misc
     * @param PortingOrderPhoneNumberConfiguration|array{
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   emergency_address_id?: string|null,
     *   messaging_profile_id?: string|null,
     *   tags?: list<string>|null,
     * } $phone_number_configuration
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     * @param list<PortingOrderRequirement|array{
     *   field_type?: value-of<FieldType>|null,
     *   field_value?: string|null,
     *   record_type?: string|null,
     *   requirement_type_id?: string|null,
     * }> $requirements
     * @param PortingOrderStatus|array{
     *   details?: list<PortingOrdersExceptionType>|null, value?: value-of<Value>|null
     * } $status
     * @param PortingOrderUserFeedback|array{
     *   user_comment?: string|null, user_rating?: int|null
     * } $user_feedback
     */
    public static function with(
        ?string $id = null,
        PortingOrderActivationSettings|array|null $activation_settings = null,
        ?array $additional_steps = null,
        ?\DateTimeInterface $created_at = null,
        ?string $customer_group_reference = null,
        ?string $customer_reference = null,
        ?string $description = null,
        PortingOrderDocuments|array|null $documents = null,
        PortingOrderEndUser|array|null $end_user = null,
        PortingOrderMessaging|array|null $messaging = null,
        PortingOrderMisc|array|null $misc = null,
        ?string $old_service_provider_ocn = null,
        ?string $parent_support_key = null,
        PortingOrderPhoneNumberConfiguration|array|null $phone_number_configuration = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?int $porting_phone_numbers_count = null,
        ?string $record_type = null,
        ?array $requirements = null,
        ?bool $requirements_met = null,
        PortingOrderStatus|array|null $status = null,
        ?string $support_key = null,
        ?\DateTimeInterface $updated_at = null,
        PortingOrderUserFeedback|array|null $user_feedback = null,
        ?string $user_id = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $activation_settings && $obj['activation_settings'] = $activation_settings;
        null !== $additional_steps && $obj['additional_steps'] = $additional_steps;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $customer_group_reference && $obj['customer_group_reference'] = $customer_group_reference;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $description && $obj['description'] = $description;
        null !== $documents && $obj['documents'] = $documents;
        null !== $end_user && $obj['end_user'] = $end_user;
        null !== $messaging && $obj['messaging'] = $messaging;
        null !== $misc && $obj['misc'] = $misc;
        null !== $old_service_provider_ocn && $obj['old_service_provider_ocn'] = $old_service_provider_ocn;
        null !== $parent_support_key && $obj['parent_support_key'] = $parent_support_key;
        null !== $phone_number_configuration && $obj['phone_number_configuration'] = $phone_number_configuration;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $porting_phone_numbers_count && $obj['porting_phone_numbers_count'] = $porting_phone_numbers_count;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $requirements && $obj['requirements'] = $requirements;
        null !== $requirements_met && $obj['requirements_met'] = $requirements_met;
        null !== $status && $obj['status'] = $status;
        null !== $support_key && $obj['support_key'] = $support_key;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $user_feedback && $obj['user_feedback'] = $user_feedback;
        null !== $user_id && $obj['user_id'] = $user_id;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;

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
     *   activation_status?: value-of<ActivationStatus>|null,
     *   fast_port_eligible?: bool|null,
     *   foc_datetime_actual?: \DateTimeInterface|null,
     *   foc_datetime_requested?: \DateTimeInterface|null,
     * } $activationSettings
     */
    public function withActivationSettings(
        PortingOrderActivationSettings|array $activationSettings
    ): self {
        $obj = clone $this;
        $obj['activation_settings'] = $activationSettings;

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
        $obj['additional_steps'] = $additionalSteps;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * A customer-specified group reference for customer bookkeeping purposes.
     */
    public function withCustomerGroupReference(
        ?string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj['customer_group_reference'] = $customerGroupReference;

        return $obj;
    }

    /**
     * A customer-specified reference number for customer bookkeeping purposes.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

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
        $obj['end_user'] = $endUser;

        return $obj;
    }

    /**
     * Information about messaging porting process.
     *
     * @param PortingOrderMessaging|array{
     *   enable_messaging?: bool|null,
     *   messaging_capable?: bool|null,
     *   messaging_port_completed?: bool|null,
     *   messaging_port_status?: value-of<MessagingPortStatus>|null,
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
     *   new_billing_phone_number?: string|null,
     *   remaining_numbers_action?: value-of<RemainingNumbersAction>|null,
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
        $obj['old_service_provider_ocn'] = $oldServiceProviderOcn;

        return $obj;
    }

    /**
     * A key to reference for the porting order group when contacting Telnyx customer support. This information is not available for porting orders in `draft` state.
     */
    public function withParentSupportKey(?string $parentSupportKey): self
    {
        $obj = clone $this;
        $obj['parent_support_key'] = $parentSupportKey;

        return $obj;
    }

    /**
     * @param PortingOrderPhoneNumberConfiguration|array{
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   emergency_address_id?: string|null,
     *   messaging_profile_id?: string|null,
     *   tags?: list<string>|null,
     * } $phoneNumberConfiguration
     */
    public function withPhoneNumberConfiguration(
        PortingOrderPhoneNumberConfiguration|array $phoneNumberConfiguration
    ): self {
        $obj = clone $this;
        $obj['phone_number_configuration'] = $phoneNumberConfiguration;

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
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Count of phone numbers associated with this porting order.
     */
    public function withPortingPhoneNumbersCount(
        int $portingPhoneNumbersCount
    ): self {
        $obj = clone $this;
        $obj['porting_phone_numbers_count'] = $portingPhoneNumbersCount;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * List of documentation requirements for porting numbers. Can be set directly or via the `requirement_group_id` parameter.
     *
     * @param list<PortingOrderRequirement|array{
     *   field_type?: value-of<FieldType>|null,
     *   field_value?: string|null,
     *   record_type?: string|null,
     *   requirement_type_id?: string|null,
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
        $obj['requirements_met'] = $requirementsMet;

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
        $obj['support_key'] = $supportKey;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * @param PortingOrderUserFeedback|array{
     *   user_comment?: string|null, user_rating?: int|null
     * } $userFeedback
     */
    public function withUserFeedback(
        PortingOrderUserFeedback|array $userFeedback
    ): self {
        $obj = clone $this;
        $obj['user_feedback'] = $userFeedback;

        return $obj;
    }

    /**
     * Identifies the user (or organization) who requested the porting order.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }

    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhook_url'] = $webhookURL;

        return $obj;
    }
}
