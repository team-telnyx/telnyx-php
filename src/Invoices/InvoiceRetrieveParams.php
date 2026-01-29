<?php

declare(strict_types=1);

namespace Telnyx\Invoices;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;

/**
 * Retrieve a single invoice by its unique identifier.
 *
 * @see Telnyx\Services\InvoicesService::retrieve()
 *
 * @phpstan-type InvoiceRetrieveParamsShape = array{
 *   action?: null|Action|value-of<Action>
 * }
 */
final class InvoiceRetrieveParams implements BaseModel
{
    /** @use SdkModel<InvoiceRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Invoice action.
     *
     * @var value-of<Action>|null $action
     */
    #[Optional(enum: Action::class)]
    public ?string $action;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Action|value-of<Action>|null $action
     */
    public static function with(Action|string|null $action = null): self
    {
        $self = new self;

        null !== $action && $self['action'] = $action;

        return $self;
    }

    /**
     * Invoice action.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }
}
