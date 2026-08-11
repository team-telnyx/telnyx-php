<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CapabilitiesResponseShape = array{
 *   brandEntity: bool,
 *   brandVerification: bool,
 *   campaigns: bool,
 *   distinctLaunchPhase: bool,
 *   inviteTestDevices: bool,
 *   perCarrierApproval: bool,
 *   submissionSections: bool,
 *   templates: bool,
 *   vendorWebhooks: bool,
 * }
 */
final class CapabilitiesResponse implements BaseModel
{
    /** @use SdkModel<CapabilitiesResponseShape> */
    use SdkModel;

    #[Required('brand_entity')]
    public bool $brandEntity;

    #[Required('brand_verification')]
    public bool $brandVerification;

    #[Required]
    public bool $campaigns;

    #[Required('distinct_launch_phase')]
    public bool $distinctLaunchPhase;

    #[Required('invite_test_devices')]
    public bool $inviteTestDevices;

    #[Required('per_carrier_approval')]
    public bool $perCarrierApproval;

    #[Required('submission_sections')]
    public bool $submissionSections;

    #[Required]
    public bool $templates;

    #[Required('vendor_webhooks')]
    public bool $vendorWebhooks;

    /**
     * `new CapabilitiesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CapabilitiesResponse::with(
     *   brandEntity: ...,
     *   brandVerification: ...,
     *   campaigns: ...,
     *   distinctLaunchPhase: ...,
     *   inviteTestDevices: ...,
     *   perCarrierApproval: ...,
     *   submissionSections: ...,
     *   templates: ...,
     *   vendorWebhooks: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CapabilitiesResponse)
     *   ->withBrandEntity(...)
     *   ->withBrandVerification(...)
     *   ->withCampaigns(...)
     *   ->withDistinctLaunchPhase(...)
     *   ->withInviteTestDevices(...)
     *   ->withPerCarrierApproval(...)
     *   ->withSubmissionSections(...)
     *   ->withTemplates(...)
     *   ->withVendorWebhooks(...)
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
     */
    public static function with(
        bool $brandEntity,
        bool $brandVerification,
        bool $campaigns,
        bool $distinctLaunchPhase,
        bool $inviteTestDevices,
        bool $perCarrierApproval,
        bool $submissionSections,
        bool $templates,
        bool $vendorWebhooks,
    ): self {
        $self = new self;

        $self['brandEntity'] = $brandEntity;
        $self['brandVerification'] = $brandVerification;
        $self['campaigns'] = $campaigns;
        $self['distinctLaunchPhase'] = $distinctLaunchPhase;
        $self['inviteTestDevices'] = $inviteTestDevices;
        $self['perCarrierApproval'] = $perCarrierApproval;
        $self['submissionSections'] = $submissionSections;
        $self['templates'] = $templates;
        $self['vendorWebhooks'] = $vendorWebhooks;

        return $self;
    }

    public function withBrandEntity(bool $brandEntity): self
    {
        $self = clone $this;
        $self['brandEntity'] = $brandEntity;

        return $self;
    }

    public function withBrandVerification(bool $brandVerification): self
    {
        $self = clone $this;
        $self['brandVerification'] = $brandVerification;

        return $self;
    }

    public function withCampaigns(bool $campaigns): self
    {
        $self = clone $this;
        $self['campaigns'] = $campaigns;

        return $self;
    }

    public function withDistinctLaunchPhase(bool $distinctLaunchPhase): self
    {
        $self = clone $this;
        $self['distinctLaunchPhase'] = $distinctLaunchPhase;

        return $self;
    }

    public function withInviteTestDevices(bool $inviteTestDevices): self
    {
        $self = clone $this;
        $self['inviteTestDevices'] = $inviteTestDevices;

        return $self;
    }

    public function withPerCarrierApproval(bool $perCarrierApproval): self
    {
        $self = clone $this;
        $self['perCarrierApproval'] = $perCarrierApproval;

        return $self;
    }

    public function withSubmissionSections(bool $submissionSections): self
    {
        $self = clone $this;
        $self['submissionSections'] = $submissionSections;

        return $self;
    }

    public function withTemplates(bool $templates): self
    {
        $self = clone $this;
        $self['templates'] = $templates;

        return $self;
    }

    public function withVendorWebhooks(bool $vendorWebhooks): self
    {
        $self = clone $this;
        $self['vendorWebhooks'] = $vendorWebhooks;

        return $self;
    }
}
