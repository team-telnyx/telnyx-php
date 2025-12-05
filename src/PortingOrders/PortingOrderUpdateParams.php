<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderMisc\RemainingNumbersAction;
use Telnyx\PortingOrders\PortingOrderUpdateParams\ActivationSettings;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Messaging;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Requirement;

/**
 * Edits the details of an existing porting order.
 *
 * Any or all of a porting orders attributes may be included in the resource object included in a PATCH request.
 *
 * If a request does not include all of the attributes for a resource, the system will interpret the missing attributes as if they were included with their current values. To explicitly set something to null, it must be included in the request with a null value.
 *
 * @see Telnyx\Services\PortingOrdersService::update()
 *
 * @phpstan-type PortingOrderUpdateParamsShape = array{
 *   activation_settings?: ActivationSettings|array{
 *     foc_datetime_requested?: \DateTimeInterface|null
 *   },
 *   customer_group_reference?: string,
 *   customer_reference?: string,
 *   documents?: PortingOrderDocuments|array{
 *     invoice?: string|null, loa?: string|null
 *   },
 *   end_user?: PortingOrderEndUser|array{
 *     admin?: PortingOrderEndUserAdmin|null,
 *     location?: PortingOrderEndUserLocation|null,
 *   },
 *   messaging?: Messaging|array{enable_messaging?: bool|null},
 *   misc?: null|PortingOrderMisc|array{
 *     new_billing_phone_number?: string|null,
 *     remaining_numbers_action?: value-of<RemainingNumbersAction>|null,
 *     type?: value-of<PortingOrderType>|null,
 *   },
 *   phone_number_configuration?: PortingOrderPhoneNumberConfiguration|array{
 *     billing_group_id?: string|null,
 *     connection_id?: string|null,
 *     emergency_address_id?: string|null,
 *     messaging_profile_id?: string|null,
 *     tags?: list<string>|null,
 *   },
 *   requirement_group_id?: string,
 *   requirements?: list<Requirement|array{
 *     field_value: string, requirement_type_id: string
 *   }>,
 *   user_feedback?: PortingOrderUserFeedback|array{
 *     user_comment?: string|null, user_rating?: int|null
 *   },
 *   webhook_url?: string,
 * }
 */
final class PortingOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<PortingOrderUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?ActivationSettings $activation_settings;

    #[Api(optional: true)]
    public ?string $customer_group_reference;

    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     */
    #[Api(optional: true)]
    public ?PortingOrderDocuments $documents;

    #[Api(optional: true)]
    public ?PortingOrderEndUser $end_user;

    #[Api(optional: true)]
    public ?Messaging $messaging;

    #[Api(nullable: true, optional: true)]
    public ?PortingOrderMisc $misc;

    #[Api(optional: true)]
    public ?PortingOrderPhoneNumberConfiguration $phone_number_configuration;

    /**
     * If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     */
    #[Api(optional: true)]
    public ?string $requirement_group_id;

    /**
     * List of requirements for porting numbers.
     *
     * @var list<Requirement>|null $requirements
     */
    #[Api(list: Requirement::class, optional: true)]
    public ?array $requirements;

    #[Api(optional: true)]
    public ?PortingOrderUserFeedback $user_feedback;

    #[Api(optional: true)]
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
     * @param ActivationSettings|array{
     *   foc_datetime_requested?: \DateTimeInterface|null
     * } $activation_settings
     * @param PortingOrderDocuments|array{
     *   invoice?: string|null, loa?: string|null
     * } $documents
     * @param PortingOrderEndUser|array{
     *   admin?: PortingOrderEndUserAdmin|null,
     *   location?: PortingOrderEndUserLocation|null,
     * } $end_user
     * @param Messaging|array{enable_messaging?: bool|null} $messaging
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
     * @param list<Requirement|array{
     *   field_value: string, requirement_type_id: string
     * }> $requirements
     * @param PortingOrderUserFeedback|array{
     *   user_comment?: string|null, user_rating?: int|null
     * } $user_feedback
     */
    public static function with(
        ActivationSettings|array|null $activation_settings = null,
        ?string $customer_group_reference = null,
        ?string $customer_reference = null,
        PortingOrderDocuments|array|null $documents = null,
        PortingOrderEndUser|array|null $end_user = null,
        Messaging|array|null $messaging = null,
        PortingOrderMisc|array|null $misc = null,
        PortingOrderPhoneNumberConfiguration|array|null $phone_number_configuration = null,
        ?string $requirement_group_id = null,
        ?array $requirements = null,
        PortingOrderUserFeedback|array|null $user_feedback = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $activation_settings && $obj['activation_settings'] = $activation_settings;
        null !== $customer_group_reference && $obj['customer_group_reference'] = $customer_group_reference;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $documents && $obj['documents'] = $documents;
        null !== $end_user && $obj['end_user'] = $end_user;
        null !== $messaging && $obj['messaging'] = $messaging;
        null !== $misc && $obj['misc'] = $misc;
        null !== $phone_number_configuration && $obj['phone_number_configuration'] = $phone_number_configuration;
        null !== $requirement_group_id && $obj['requirement_group_id'] = $requirement_group_id;
        null !== $requirements && $obj['requirements'] = $requirements;
        null !== $user_feedback && $obj['user_feedback'] = $user_feedback;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;

        return $obj;
    }

    /**
     * @param ActivationSettings|array{
     *   foc_datetime_requested?: \DateTimeInterface|null
     * } $activationSettings
     */
    public function withActivationSettings(
        ActivationSettings|array $activationSettings
    ): self {
        $obj = clone $this;
        $obj['activation_settings'] = $activationSettings;

        return $obj;
    }

    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj['customer_group_reference'] = $customerGroupReference;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

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
     * @param Messaging|array{enable_messaging?: bool|null} $messaging
     */
    public function withMessaging(Messaging|array $messaging): self
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
     * If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj['requirement_group_id'] = $requirementGroupID;

        return $obj;
    }

    /**
     * List of requirements for porting numbers.
     *
     * @param list<Requirement|array{
     *   field_value: string, requirement_type_id: string
     * }> $requirements
     */
    public function withRequirements(array $requirements): self
    {
        $obj = clone $this;
        $obj['requirements'] = $requirements;

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

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhook_url'] = $webhookURL;

        return $obj;
    }
}
