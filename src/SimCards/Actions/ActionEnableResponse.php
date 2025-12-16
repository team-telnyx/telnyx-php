<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SimCardActionShape from \Telnyx\SimCards\Actions\SimCardAction
 *
 * @phpstan-type ActionEnableResponseShape = array{
 *   data?: null|SimCardAction|SimCardActionShape
 * }
 */
final class ActionEnableResponse implements BaseModel
{
    /** @use SdkModel<ActionEnableResponseShape> */
    use SdkModel;

    /**
     * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
     */
    #[Optional]
    public ?SimCardAction $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardActionShape $data
     */
    public static function with(SimCardAction|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
     *
     * @param SimCardActionShape $data
     */
    public function withData(SimCardAction|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
