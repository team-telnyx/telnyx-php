<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
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
 * @see Telnyx\PortingOrdersService::update()
 *
 * @phpstan-type PortingOrderUpdateParamsShape = array{
 *   activation_settings?: ActivationSettings,
 *   customer_group_reference?: string,
 *   customer_reference?: string,
 *   documents?: PortingOrderDocuments,
 *   end_user?: PortingOrderEndUser,
 *   messaging?: Messaging,
 *   misc?: PortingOrderMisc,
 *   phone_number_configuration?: PortingOrderPhoneNumberConfiguration,
 *   requirement_group_id?: string,
 *   requirements?: list<Requirement>,
 *   user_feedback?: PortingOrderUserFeedback,
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

    #[Api(optional: true)]
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
     * @param list<Requirement> $requirements
     */
    public static function with(
        ?ActivationSettings $activation_settings = null,
        ?string $customer_group_reference = null,
        ?string $customer_reference = null,
        ?PortingOrderDocuments $documents = null,
        ?PortingOrderEndUser $end_user = null,
        ?Messaging $messaging = null,
        ?PortingOrderMisc $misc = null,
        ?PortingOrderPhoneNumberConfiguration $phone_number_configuration = null,
        ?string $requirement_group_id = null,
        ?array $requirements = null,
        ?PortingOrderUserFeedback $user_feedback = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $activation_settings && $obj->activation_settings = $activation_settings;
        null !== $customer_group_reference && $obj->customer_group_reference = $customer_group_reference;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $documents && $obj->documents = $documents;
        null !== $end_user && $obj->end_user = $end_user;
        null !== $messaging && $obj->messaging = $messaging;
        null !== $misc && $obj->misc = $misc;
        null !== $phone_number_configuration && $obj->phone_number_configuration = $phone_number_configuration;
        null !== $requirement_group_id && $obj->requirement_group_id = $requirement_group_id;
        null !== $requirements && $obj->requirements = $requirements;
        null !== $user_feedback && $obj->user_feedback = $user_feedback;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;

        return $obj;
    }

    public function withActivationSettings(
        ActivationSettings $activationSettings
    ): self {
        $obj = clone $this;
        $obj->activation_settings = $activationSettings;

        return $obj;
    }

    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj->customer_group_reference = $customerGroupReference;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customer_reference = $customerReference;

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
        $obj->end_user = $endUser;

        return $obj;
    }

    public function withMessaging(Messaging $messaging): self
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

    public function withPhoneNumberConfiguration(
        PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration
    ): self {
        $obj = clone $this;
        $obj->phone_number_configuration = $phoneNumberConfiguration;

        return $obj;
    }

    /**
     * If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj->requirement_group_id = $requirementGroupID;

        return $obj;
    }

    /**
     * List of requirements for porting numbers.
     *
     * @param list<Requirement> $requirements
     */
    public function withRequirements(array $requirements): self
    {
        $obj = clone $this;
        $obj->requirements = $requirements;

        return $obj;
    }

    public function withUserFeedback(
        PortingOrderUserFeedback $userFeedback
    ): self {
        $obj = clone $this;
        $obj->user_feedback = $userFeedback;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhook_url = $webhookURL;

        return $obj;
    }
}
