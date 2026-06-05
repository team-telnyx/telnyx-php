<?php

declare(strict_types=1);

namespace Telnyx\CallReasons\CallReasonValidateResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   allPreApproved: bool,
 *   nonApprovedReasons: list<string>,
 *   requiresManualVetting: bool,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * `true` when every supplied reason matches a pre-vetted entry in the call-reason library. When `true`, the DIR will sail through the call-reasons portion of vetting.
     */
    #[Required('all_pre_approved')]
    public bool $allPreApproved;

    /**
     * Subset of the input that does NOT match the pre-vetted library. The DIR can still be submitted with these — they will go through manual review.
     *
     * @var list<string> $nonApprovedReasons
     */
    #[Required('non_approved_reasons', list: 'string')]
    public array $nonApprovedReasons;

    /**
     * `true` when at least one supplied reason is in `non_approved_reasons`. Equivalent to `non_approved_reasons.length > 0` and the inverse of `all_pre_approved`.
     */
    #[Required('requires_manual_vetting')]
    public bool $requiresManualVetting;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   allPreApproved: ..., nonApprovedReasons: ..., requiresManualVetting: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withAllPreApproved(...)
     *   ->withNonApprovedReasons(...)
     *   ->withRequiresManualVetting(...)
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
     * @param list<string> $nonApprovedReasons
     */
    public static function with(
        bool $allPreApproved,
        array $nonApprovedReasons,
        bool $requiresManualVetting
    ): self {
        $self = new self;

        $self['allPreApproved'] = $allPreApproved;
        $self['nonApprovedReasons'] = $nonApprovedReasons;
        $self['requiresManualVetting'] = $requiresManualVetting;

        return $self;
    }

    /**
     * `true` when every supplied reason matches a pre-vetted entry in the call-reason library. When `true`, the DIR will sail through the call-reasons portion of vetting.
     */
    public function withAllPreApproved(bool $allPreApproved): self
    {
        $self = clone $this;
        $self['allPreApproved'] = $allPreApproved;

        return $self;
    }

    /**
     * Subset of the input that does NOT match the pre-vetted library. The DIR can still be submitted with these — they will go through manual review.
     *
     * @param list<string> $nonApprovedReasons
     */
    public function withNonApprovedReasons(array $nonApprovedReasons): self
    {
        $self = clone $this;
        $self['nonApprovedReasons'] = $nonApprovedReasons;

        return $self;
    }

    /**
     * `true` when at least one supplied reason is in `non_approved_reasons`. Equivalent to `non_approved_reasons.length > 0` and the inverse of `all_pre_approved`.
     */
    public function withRequiresManualVetting(bool $requiresManualVetting): self
    {
        $self = clone $this;
        $self['requiresManualVetting'] = $requiresManualVetting;

        return $self;
    }
}
