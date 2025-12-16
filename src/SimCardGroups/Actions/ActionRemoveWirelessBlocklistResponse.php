<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimCardGroupActionShape from \Telnyx\SimCardGroups\Actions\SimCardGroupAction
 *
 * @phpstan-type ActionRemoveWirelessBlocklistResponseShape = array{
 *   data?: null|SimCardGroupAction|SimCardGroupActionShape
 * }
 */
final class ActionRemoveWirelessBlocklistResponse implements BaseModel
{
    /** @use SdkModel<ActionRemoveWirelessBlocklistResponseShape> */
    use SdkModel;

    /**
     * This object represents a SIM card group action request. It allows tracking the current status of an operation that impacts the SIM card group and SIM card in it.
     */
    #[Optional]
    public ?SimCardGroupAction $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardGroupActionShape $data
     */
    public static function with(SimCardGroupAction|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * This object represents a SIM card group action request. It allows tracking the current status of an operation that impacts the SIM card group and SIM card in it.
     *
     * @param SimCardGroupActionShape $data
     */
    public function withData(SimCardGroupAction|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
