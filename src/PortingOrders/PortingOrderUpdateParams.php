<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
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
 * @see Telnyx\Services\PortingOrdersService::update()
 *
 * @phpstan-import-type ActivationSettingsShape from \Telnyx\PortingOrders\PortingOrderUpdateParams\ActivationSettings
 * @phpstan-import-type PortingOrderDocumentsShape from \Telnyx\PortingOrders\PortingOrderDocuments
 * @phpstan-import-type PortingOrderEndUserShape from \Telnyx\PortingOrders\PortingOrderEndUser
 * @phpstan-import-type MessagingShape from \Telnyx\PortingOrders\PortingOrderUpdateParams\Messaging
 * @phpstan-import-type PortingOrderMiscShape from \Telnyx\PortingOrders\PortingOrderMisc
 * @phpstan-import-type PortingOrderPhoneNumberConfigurationShape from \Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration
 * @phpstan-import-type RequirementShape from \Telnyx\PortingOrders\PortingOrderUpdateParams\Requirement
 * @phpstan-import-type PortingOrderUserFeedbackShape from \Telnyx\PortingOrders\PortingOrderUserFeedback
 *
 * @phpstan-type PortingOrderUpdateParamsShape = array{
 *   activationSettings?: ActivationSettingsShape|null,
 *   customerGroupReference?: string|null,
 *   customerReference?: string|null,
 *   documents?: PortingOrderDocumentsShape|null,
 *   endUser?: PortingOrderEndUserShape|null,
 *   messaging?: MessagingShape|null,
 *   misc?: PortingOrderMiscShape|null,
 *   phoneNumberConfiguration?: PortingOrderPhoneNumberConfigurationShape|null,
 *   requirementGroupID?: string|null,
 *   requirements?: list<RequirementShape>|null,
 *   userFeedback?: PortingOrderUserFeedbackShape|null,
 *   webhookURL?: string|null,
 * }
 */
final class PortingOrderUpdateParams implements BaseModel
{
    /** @use SdkModel<PortingOrderUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional('activation_settings')]
    public ?ActivationSettings $activationSettings;

    #[Optional('customer_group_reference')]
    public ?string $customerGroupReference;

    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     */
    #[Optional]
    public ?PortingOrderDocuments $documents;

    #[Optional('end_user')]
    public ?PortingOrderEndUser $endUser;

    #[Optional]
    public ?Messaging $messaging;

    #[Optional(nullable: true)]
    public ?PortingOrderMisc $misc;

    #[Optional('phone_number_configuration')]
    public ?PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration;

    /**
     * If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     */
    #[Optional('requirement_group_id')]
    public ?string $requirementGroupID;

    /**
     * List of requirements for porting numbers.
     *
     * @var list<Requirement>|null $requirements
     */
    #[Optional(list: Requirement::class)]
    public ?array $requirements;

    #[Optional('user_feedback')]
    public ?PortingOrderUserFeedback $userFeedback;

    #[Optional('webhook_url')]
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
     * @param ActivationSettingsShape $activationSettings
     * @param PortingOrderDocumentsShape $documents
     * @param PortingOrderEndUserShape $endUser
     * @param MessagingShape $messaging
     * @param PortingOrderMiscShape|null $misc
     * @param PortingOrderPhoneNumberConfigurationShape $phoneNumberConfiguration
     * @param list<RequirementShape> $requirements
     * @param PortingOrderUserFeedbackShape $userFeedback
     */
    public static function with(
        ActivationSettings|array|null $activationSettings = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        PortingOrderDocuments|array|null $documents = null,
        PortingOrderEndUser|array|null $endUser = null,
        Messaging|array|null $messaging = null,
        PortingOrderMisc|array|null $misc = null,
        PortingOrderPhoneNumberConfiguration|array|null $phoneNumberConfiguration = null,
        ?string $requirementGroupID = null,
        ?array $requirements = null,
        PortingOrderUserFeedback|array|null $userFeedback = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $activationSettings && $self['activationSettings'] = $activationSettings;
        null !== $customerGroupReference && $self['customerGroupReference'] = $customerGroupReference;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $documents && $self['documents'] = $documents;
        null !== $endUser && $self['endUser'] = $endUser;
        null !== $messaging && $self['messaging'] = $messaging;
        null !== $misc && $self['misc'] = $misc;
        null !== $phoneNumberConfiguration && $self['phoneNumberConfiguration'] = $phoneNumberConfiguration;
        null !== $requirementGroupID && $self['requirementGroupID'] = $requirementGroupID;
        null !== $requirements && $self['requirements'] = $requirements;
        null !== $userFeedback && $self['userFeedback'] = $userFeedback;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * @param ActivationSettingsShape $activationSettings
     */
    public function withActivationSettings(
        ActivationSettings|array $activationSettings
    ): self {
        $self = clone $this;
        $self['activationSettings'] = $activationSettings;

        return $self;
    }

    public function withCustomerGroupReference(
        string $customerGroupReference
    ): self {
        $self = clone $this;
        $self['customerGroupReference'] = $customerGroupReference;

        return $self;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Can be specified directly or via the `requirement_group_id` parameter.
     *
     * @param PortingOrderDocumentsShape $documents
     */
    public function withDocuments(PortingOrderDocuments|array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * @param PortingOrderEndUserShape $endUser
     */
    public function withEndUser(PortingOrderEndUser|array $endUser): self
    {
        $self = clone $this;
        $self['endUser'] = $endUser;

        return $self;
    }

    /**
     * @param MessagingShape $messaging
     */
    public function withMessaging(Messaging|array $messaging): self
    {
        $self = clone $this;
        $self['messaging'] = $messaging;

        return $self;
    }

    /**
     * @param PortingOrderMiscShape|null $misc
     */
    public function withMisc(PortingOrderMisc|array|null $misc): self
    {
        $self = clone $this;
        $self['misc'] = $misc;

        return $self;
    }

    /**
     * @param PortingOrderPhoneNumberConfigurationShape $phoneNumberConfiguration
     */
    public function withPhoneNumberConfiguration(
        PortingOrderPhoneNumberConfiguration|array $phoneNumberConfiguration
    ): self {
        $self = clone $this;
        $self['phoneNumberConfiguration'] = $phoneNumberConfiguration;

        return $self;
    }

    /**
     * If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $self = clone $this;
        $self['requirementGroupID'] = $requirementGroupID;

        return $self;
    }

    /**
     * List of requirements for porting numbers.
     *
     * @param list<RequirementShape> $requirements
     */
    public function withRequirements(array $requirements): self
    {
        $self = clone $this;
        $self['requirements'] = $requirements;

        return $self;
    }

    /**
     * @param PortingOrderUserFeedbackShape $userFeedback
     */
    public function withUserFeedback(
        PortingOrderUserFeedback|array $userFeedback
    ): self {
        $self = clone $this;
        $self['userFeedback'] = $userFeedback;

        return $self;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
