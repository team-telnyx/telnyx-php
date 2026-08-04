<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WirelessSimCardActionShape from \Telnyx\SimCards\Actions\WirelessSimCardAction
 *
 * @phpstan-type ActionSetStandbyResponseShape = array{
 *   data?: null|WirelessSimCardAction|WirelessSimCardActionShape
 * }
 */
final class ActionSetStandbyResponse implements BaseModel
{
    /** @use SdkModel<ActionSetStandbyResponseShape> */
    use SdkModel;

    /**
     * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
     */
    #[Optional]
    public ?WirelessSimCardAction $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WirelessSimCardAction|WirelessSimCardActionShape|null $data
     */
    public static function with(WirelessSimCardAction|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
     *
     * @param WirelessSimCardAction|WirelessSimCardActionShape $data
     */
    public function withData(WirelessSimCardAction|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
