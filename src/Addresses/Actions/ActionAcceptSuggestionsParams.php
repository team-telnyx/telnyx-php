<?php

declare(strict_types=1);

namespace Telnyx\Addresses\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Accepts this address suggestion as a new emergency address for Operator Connect and finishes the uploads of the numbers associated with it to Microsoft.
 *
 * @see Telnyx\Addresses\Actions->acceptSuggestions
 *
 * @phpstan-type ActionAcceptSuggestionsParamsShape = array{id?: string}
 */
final class ActionAcceptSuggestionsParams implements BaseModel
{
    /** @use SdkModel<ActionAcceptSuggestionsParamsShape> */
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
