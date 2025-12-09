<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The SIM card will be decommissioned, removed from your account and you will stop being charged.<br />The SIM card won't be able to connect to the network after the deletion is completed, thus making it impossible to consume data.<br/>
 * Transitioning to the disabled state may take a period of time.
 * Until the transition is completed, the SIM card status will be disabling <code>disabling</code>.<br />In order to re-enable the SIM card, you will need to re-register it.
 *
 * @see Telnyx\Services\SimCardsService::delete()
 *
 * @phpstan-type SimCardDeleteParamsShape = array{reportLost?: bool}
 */
final class SimCardDeleteParams implements BaseModel
{
    /** @use SdkModel<SimCardDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Enables deletion of disabled eSIMs that can't be uninstalled from a device. This is irreversible and the eSIM cannot be re-registered.
     */
    #[Optional]
    public ?bool $reportLost;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $reportLost = null): self
    {
        $self = new self;

        null !== $reportLost && $self['reportLost'] = $reportLost;

        return $self;
    }

    /**
     * Enables deletion of disabled eSIMs that can't be uninstalled from a device. This is irreversible and the eSIM cannot be re-registered.
     */
    public function withReportLost(bool $reportLost): self
    {
        $self = clone $this;
        $self['reportLost'] = $reportLost;

        return $self;
    }
}
