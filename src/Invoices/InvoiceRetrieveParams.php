<?php

declare(strict_types=1);

namespace Telnyx\Invoices;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new InvoiceRetrieveParams); // set properties as needed
 * $client->invoices->retrieve(...$params->toArray());
 * ```
 * Retrieve a single invoice by its unique identifier.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->invoices->retrieve(...$params->toArray());`
 *
 * @see Telnyx\Invoices->retrieve
 *
 * @phpstan-type invoice_retrieve_params = array{action?: Action|value-of<Action>}
 */
final class InvoiceRetrieveParams implements BaseModel
{
    /** @use SdkModel<invoice_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Invoice action.
     *
     * @var value-of<Action>|null $action
     */
    #[Api(enum: Action::class, optional: true)]
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
     * @param Action|value-of<Action> $action
     */
    public static function with(Action|string|null $action = null): self
    {
        $obj = new self;

        null !== $action && $obj->action = $action instanceof Action ? $action->value : $action;

        return $obj;
    }

    /**
     * Invoice action.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj->action = $action instanceof Action ? $action->value : $action;

        return $obj;
    }
}
