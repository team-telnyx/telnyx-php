<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\AgentResponse\BillingCategory;
use Telnyx\Rcs\Agents\AgentResponse\Status;
use Telnyx\Rcs\Agents\TestDevices\TestDeviceResponse;

/**
 * @phpstan-import-type CapabilitiesResponseShape from \Telnyx\Rcs\Agents\CapabilitiesResponse
 * @phpstan-import-type CarrierApprovalResponseShape from \Telnyx\Rcs\Agents\CarrierApprovalResponse
 * @phpstan-import-type AgentConfigurationShape from \Telnyx\Rcs\Agents\AgentConfiguration
 * @phpstan-import-type TestDeviceResponseShape from \Telnyx\Rcs\Agents\TestDevices\TestDeviceResponse
 *
 * @phpstan-type AgentResponseShape = array{
 *   agentID: string,
 *   basicsStatus: null|AgentSubmissionStatus|value-of<AgentSubmissionStatus>,
 *   billingCategory: null|BillingCategory|value-of<BillingCategory>,
 *   brandID: string,
 *   campaignStatus: null|AgentSubmissionStatus|value-of<AgentSubmissionStatus>,
 *   capabilities: CapabilitiesResponse|CapabilitiesResponseShape,
 *   carrierApprovals: list<CarrierApprovalResponse|CarrierApprovalResponseShape>,
 *   configuration: AgentConfiguration|AgentConfigurationShape,
 *   displayName: string,
 *   hostingRegion: string|null,
 *   profileID: string|null,
 *   status: Status|value-of<Status>,
 *   testDevices: list<TestDeviceResponse|TestDeviceResponseShape>,
 *   testingStatus: null|AgentSubmissionStatus|value-of<AgentSubmissionStatus>,
 *   useCase: AgentUseCase|value-of<AgentUseCase>,
 * }
 */
final class AgentResponse implements BaseModel
{
    /** @use SdkModel<AgentResponseShape> */
    use SdkModel;

    #[Required('agent_id')]
    public string $agentID;

    /** @var value-of<AgentSubmissionStatus>|null $basicsStatus */
    #[Required('basics_status', enum: AgentSubmissionStatus::class)]
    public ?string $basicsStatus;

    /** @var value-of<BillingCategory>|null $billingCategory */
    #[Required('billing_category', enum: BillingCategory::class)]
    public ?string $billingCategory;

    #[Required('brand_id')]
    public string $brandID;

    /** @var value-of<AgentSubmissionStatus>|null $campaignStatus */
    #[Required('campaign_status', enum: AgentSubmissionStatus::class)]
    public ?string $campaignStatus;

    #[Required]
    public CapabilitiesResponse $capabilities;

    /** @var list<CarrierApprovalResponse> $carrierApprovals */
    #[Required('carrier_approvals', list: CarrierApprovalResponse::class)]
    public array $carrierApprovals;

    #[Required]
    public AgentConfiguration $configuration;

    #[Required('display_name')]
    public string $displayName;

    #[Required('hosting_region')]
    public ?string $hostingRegion;

    #[Required('profile_id')]
    public ?string $profileID;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<TestDeviceResponse> $testDevices */
    #[Required('test_devices', list: TestDeviceResponse::class)]
    public array $testDevices;

    /** @var value-of<AgentSubmissionStatus>|null $testingStatus */
    #[Required('testing_status', enum: AgentSubmissionStatus::class)]
    public ?string $testingStatus;

    /** @var value-of<AgentUseCase> $useCase */
    #[Required('use_case', enum: AgentUseCase::class)]
    public string $useCase;

    /**
     * `new AgentResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentResponse::with(
     *   agentID: ...,
     *   basicsStatus: ...,
     *   billingCategory: ...,
     *   brandID: ...,
     *   campaignStatus: ...,
     *   capabilities: ...,
     *   carrierApprovals: ...,
     *   configuration: ...,
     *   displayName: ...,
     *   hostingRegion: ...,
     *   profileID: ...,
     *   status: ...,
     *   testDevices: ...,
     *   testingStatus: ...,
     *   useCase: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentResponse)
     *   ->withAgentID(...)
     *   ->withBasicsStatus(...)
     *   ->withBillingCategory(...)
     *   ->withBrandID(...)
     *   ->withCampaignStatus(...)
     *   ->withCapabilities(...)
     *   ->withCarrierApprovals(...)
     *   ->withConfiguration(...)
     *   ->withDisplayName(...)
     *   ->withHostingRegion(...)
     *   ->withProfileID(...)
     *   ->withStatus(...)
     *   ->withTestDevices(...)
     *   ->withTestingStatus(...)
     *   ->withUseCase(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AgentSubmissionStatus|value-of<AgentSubmissionStatus>|null $basicsStatus
     * @param BillingCategory|value-of<BillingCategory>|null $billingCategory
     * @param AgentSubmissionStatus|value-of<AgentSubmissionStatus>|null $campaignStatus
     * @param CapabilitiesResponse|CapabilitiesResponseShape $capabilities
     * @param list<CarrierApprovalResponse|CarrierApprovalResponseShape> $carrierApprovals
     * @param AgentConfiguration|AgentConfigurationShape $configuration
     * @param Status|value-of<Status> $status
     * @param list<TestDeviceResponse|TestDeviceResponseShape> $testDevices
     * @param AgentSubmissionStatus|value-of<AgentSubmissionStatus>|null $testingStatus
     * @param AgentUseCase|value-of<AgentUseCase> $useCase
     */
    public static function with(
        string $agentID,
        AgentSubmissionStatus|string|null $basicsStatus,
        BillingCategory|string|null $billingCategory,
        string $brandID,
        AgentSubmissionStatus|string|null $campaignStatus,
        CapabilitiesResponse|array $capabilities,
        array $carrierApprovals,
        AgentConfiguration|array $configuration,
        string $displayName,
        ?string $hostingRegion,
        ?string $profileID,
        Status|string $status,
        array $testDevices,
        AgentSubmissionStatus|string|null $testingStatus,
        AgentUseCase|string $useCase,
    ): self {
        $self = new self;

        $self['agentID'] = $agentID;
        $self['basicsStatus'] = $basicsStatus;
        $self['billingCategory'] = $billingCategory;
        $self['brandID'] = $brandID;
        $self['campaignStatus'] = $campaignStatus;
        $self['capabilities'] = $capabilities;
        $self['carrierApprovals'] = $carrierApprovals;
        $self['configuration'] = $configuration;
        $self['displayName'] = $displayName;
        $self['hostingRegion'] = $hostingRegion;
        $self['profileID'] = $profileID;
        $self['status'] = $status;
        $self['testDevices'] = $testDevices;
        $self['testingStatus'] = $testingStatus;
        $self['useCase'] = $useCase;

        return $self;
    }

    public function withAgentID(string $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * @param AgentSubmissionStatus|value-of<AgentSubmissionStatus>|null $basicsStatus
     */
    public function withBasicsStatus(
        AgentSubmissionStatus|string|null $basicsStatus
    ): self {
        $self = clone $this;
        $self['basicsStatus'] = $basicsStatus;

        return $self;
    }

    /**
     * @param BillingCategory|value-of<BillingCategory>|null $billingCategory
     */
    public function withBillingCategory(
        BillingCategory|string|null $billingCategory
    ): self {
        $self = clone $this;
        $self['billingCategory'] = $billingCategory;

        return $self;
    }

    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * @param AgentSubmissionStatus|value-of<AgentSubmissionStatus>|null $campaignStatus
     */
    public function withCampaignStatus(
        AgentSubmissionStatus|string|null $campaignStatus
    ): self {
        $self = clone $this;
        $self['campaignStatus'] = $campaignStatus;

        return $self;
    }

    /**
     * @param CapabilitiesResponse|CapabilitiesResponseShape $capabilities
     */
    public function withCapabilities(
        CapabilitiesResponse|array $capabilities
    ): self {
        $self = clone $this;
        $self['capabilities'] = $capabilities;

        return $self;
    }

    /**
     * @param list<CarrierApprovalResponse|CarrierApprovalResponseShape> $carrierApprovals
     */
    public function withCarrierApprovals(array $carrierApprovals): self
    {
        $self = clone $this;
        $self['carrierApprovals'] = $carrierApprovals;

        return $self;
    }

    /**
     * @param AgentConfiguration|AgentConfigurationShape $configuration
     */
    public function withConfiguration(
        AgentConfiguration|array $configuration
    ): self {
        $self = clone $this;
        $self['configuration'] = $configuration;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withHostingRegion(?string $hostingRegion): self
    {
        $self = clone $this;
        $self['hostingRegion'] = $hostingRegion;

        return $self;
    }

    public function withProfileID(?string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param list<TestDeviceResponse|TestDeviceResponseShape> $testDevices
     */
    public function withTestDevices(array $testDevices): self
    {
        $self = clone $this;
        $self['testDevices'] = $testDevices;

        return $self;
    }

    /**
     * @param AgentSubmissionStatus|value-of<AgentSubmissionStatus>|null $testingStatus
     */
    public function withTestingStatus(
        AgentSubmissionStatus|string|null $testingStatus
    ): self {
        $self = clone $this;
        $self['testingStatus'] = $testingStatus;

        return $self;
    }

    /**
     * @param AgentUseCase|value-of<AgentUseCase> $useCase
     */
    public function withUseCase(AgentUseCase|string $useCase): self
    {
        $self = clone $this;
        $self['useCase'] = $useCase;

        return $self;
    }
}
