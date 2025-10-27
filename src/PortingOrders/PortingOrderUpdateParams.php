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
 * @see Telnyx\PortingOrders->update
 *
 * @phpstan-type porting_order_update_params = array{
 *   activationSettings?: ActivationSettings,
 *   customerGroupReference?: string,
 *   customerReference?: string,
 *   documents?: PortingOrderDocuments,
 *   endUser?: PortingOrderEndUser,
 *   messaging?: Messaging,
 *   misc?: PortingOrderMisc,
 *   phoneNumberConfiguration?: PortingOrderPhoneNumberConfiguration,
 *   requirementGroupID?: string,
 *   requirements?: list<Requirement>,
 *   userFeedback?: PortingOrderUserFeedback,
 *   webhookURL?: string,
 * }
 */
final class PortingOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<porting_order_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api('activation_settings', optional: true)]
    public ?ActivationSettings $activationSettings;

    #[Api('customer_group_reference', optional: true)]
    public ?string $customerGroupReference;

    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     */
    #[Api(optional: true)]
    public ?PortingOrderDocuments $documents;

    #[Api('end_user', optional: true)]
    public ?PortingOrderEndUser $endUser;

    #[Api(optional: true)]
    public ?Messaging $messaging;

    #[Api(optional: true)]
    public ?PortingOrderMisc $misc;

    #[Api('phone_number_configuration', optional: true)]
    public ?PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration;

    /**
     * If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     */
    #[Api('requirement_group_id', optional: true)]
    public ?string $requirementGroupID;

    /**
     * List of requirements for porting numbers.
     *
     * @var list<Requirement>|null $requirements
     */
    #[Api(list: Requirement::class, optional: true)]
    public ?array $requirements;

    #[Api('user_feedback', optional: true)]
    public ?PortingOrderUserFeedback $userFeedback;

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
     * @param list<Requirement> $requirements
     */
    public static function with(
        ?ActivationSettings $activationSettings = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        ?PortingOrderDocuments $documents = null,
        ?PortingOrderEndUser $endUser = null,
        ?Messaging $messaging = null,
        ?PortingOrderMisc $misc = null,
        ?PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration = null,
        ?string $requirementGroupID = null,
        ?array $requirements = null,
        ?PortingOrderUserFeedback $userFeedback = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $activationSettings && $obj->activationSettings = $activationSettings;
        null !== $customerGroupReference && $obj->customerGroupReference = $customerGroupReference;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $documents && $obj->documents = $documents;
        null !== $endUser && $obj->endUser = $endUser;
        null !== $messaging && $obj->messaging = $messaging;
        null !== $misc && $obj->misc = $misc;
        null !== $phoneNumberConfiguration && $obj->phoneNumberConfiguration = $phoneNumberConfiguration;
        null !== $requirementGroupID && $obj->requirementGroupID = $requirementGroupID;
        null !== $requirements && $obj->requirements = $requirements;
        null !== $userFeedback && $obj->userFeedback = $userFeedback;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    public function withActivationSettings(
        ActivationSettings $activationSettings
    ): self {
        $obj = clone $this;
        $obj->activationSettings = $activationSettings;

        return $obj;
    }

    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $obj = clone $this;
        $obj->customerGroupReference = $customerGroupReference;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

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
        $obj->phoneNumberConfiguration = $phoneNumberConfiguration;

        return $obj;
    }

    /**
     * If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj->requirementGroupID = $requirementGroupID;

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
        $obj->userFeedback = $userFeedback;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
