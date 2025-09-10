<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionAcceptSuggestionsParams); // set properties as needed
 * $client->addresses.actions->acceptSuggestions(...$params->toArray());
 * ```
 * Accepts this address suggestion as a new emergency address for Operator Connect and finishes the uploads of the numbers associated with it to Microsoft.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->addresses.actions->acceptSuggestions(...$params->toArray());`
 *
 * @see Telnyx\Addresses\Actions->acceptSuggestions
 *
 * @phpstan-type action_accept_suggestions_params = array{id?: string}
 */
final class ActionAcceptSuggestionsParams implements BaseModel
{
    /** @use SdkModel<action_accept_suggestions_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the address.
     */
    #[Api(optional: true)]
    public ?string $id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null): self
    {
        $obj = new self;

        null !== $id && $obj->id = $id;

        return $obj;
    }

    /**
     * The ID of the address.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }
}
